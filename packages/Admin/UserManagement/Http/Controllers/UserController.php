<?php

namespace Admin\UserManagement\Http\Controllers;

use Admin\Departments\Models\Department;
use Admin\Offices\Models\Office;
use Admin\UserManagement\Models\UsersInnerJoin;
use Admin\UserManagement\Traits\UsersTrait;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserNotification;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Admin\UserManagement\Models\Roles;
use Admin\UserManagement\Traits\PermissionTrait;
use DataTables;

class UserController extends Controller
{

    use PermissionTrait, UsersTrait;

    public function index(Request $request)
    {


        $user = Auth::user();
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return '#' . str_pad($data->id, 6, '0', STR_PAD_LEFT);
                })
                ->addColumn('created_at', function ($data) {
                    return date('d-m-Y H:i:s', strtotime($data->created_at));
                })
                ->addColumn('roles', function ($data) {

                    $user_roles = $data->roles;
                    $roles = '';
                    foreach ($user_roles as $role) {
                        $roles .= role_name($role->name) . ', ';
                    }
                    $roles = trim($roles);
                    $roles = trim($roles, ',');
                    $btn = ' <span class="tb-status text-success">' . $roles . '</span>';
                    return $btn;
                })
                ->addColumn('action', function ($data) {
                    $btn = ' <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                       data-toggle="dropdown"><em
                                            class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/admin/users/' . encode_id($data->id) . '"><em
                                                        class="icon ni ni-focus"></em><span>Quick View</span></a>
                                            </li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-eye"></em><span>View Details</span></a>
                                            </li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-repeat"></em><span>Transaction</span></a>
                                            </li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-activity-round"></em><span>Activities</span></a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-shield-star"></em><span>Reset Pass</span></a>
                                            </li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a>
                                            </li>
                                            <li><a href="#"><em
                                                        class="icon ni ni-na"></em><span>Suspend User</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>';
                    return $btn;
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);

        }
        $data = [];

        $data['users'] = $user->hasRole('organisation') ? User::organisationusers($user->organisation_id)->get() : User::with('roles')->get();
        return view('user-management::limitless.users.index', $data);

    }

    public function create()
    {

        $user = Auth::user();
        $role_where_not = [];
        if ($user->hasAnyRole('organisation-admin')) {
            $role_where_not = ['super-admin', 'admin', 'organisation-admin', 'portal-access'];
            $data['departments'] = Department::all();
            $data['offices'] = [];
        }

        if ($user->hasAnyRole('office-supervisor')) {
            $role_where_not = ['super-admin', 'admin', 'organisation-admin', 'permanent-secretary', 'organisation', 'registry-attendant', 'portal-access'];
            $data['departments'] = Department::all();
            $data['offices'] = Office::all();
        }
        if ($user->hasAnyRole('admin')) {
            $role_where_not = ['super-admin'];
        }

        $data['roles'] = Roles::whereNotIn('name', $role_where_not)->get();

        return view('user-management::limitless.users.create', $data);
    }

    public function store(Request $request)
    {

        $validations = [
            //'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['string', 'max:30'],
            'status' => ['string'],
            'category' => ['string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['array'],
        ];
        $validator = Validator::make($request->all(), $validations);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $user = new User;
        $user->username = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = phone($request->phone);
        $user->status = $request->status;
        $current_user_id = Auth::id();
        if ($current_user_id) {
            $user->created_by = $current_user_id;
            $user->updated_by = $current_user_id;
        }

            $organisation_id = @Auth::user()->organisation->id;
            Auth::user()->hasRole('organisation') ? $user->external_id = $organisation_id : '';

        $user->save();

        if (Auth::user()->hasRole('organisation')) {
            $this->create_user_join($user->id, $organisation_id);
            isset($request->department) ? $this->create_user_join($user->id, $request->department, 'department') : '';
            isset($request->office) ? $this->create_user_join($user->id, $request->office, 'office') : '';
        }


        $user->assignRole($request->roles);

        (in_array('permanent-secretary', $request->roles) || in_array('registry-attendant', $request->roles) || in_array('office-supervisor', $request->roles)) && !in_array('organisation', $request->roles) ? $user->assignRole('organisation') : '';

        $this->sendAdminNotification($user);

        $redirect_to = 'admin/users';
        return redirect($redirect_to)->with('success', 'User ' . $request->first_name . ' created');
    }

    public function sendAdminNotification($user){
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();

        Notification::send($admins, new NewUserNotification($user));
    }

    public function addSignature(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'signature' => ['mimes:pdf,jpg,jpeg,png', 'required'],
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $directory = '/Users/digital_signature';
        Storage::disk('public_storage')->makeDirectory($directory);///Creates the directory if it doesn't exist

        if ($request->hasFile('signature')) {
            $file = Storage::disk('public_storage')->putFileAs($directory, $request->file('signature'), 'user_' . decode_id($request->user_id) . '.' . $request->file('signature')->getClientOriginalExtension());///stores the file
            $path = 'storage/' . $file;
            $request->file('signature')->getClientOriginalExtension();

            $user = User::find(decode_id($request->user_id));
            $user->digital_signature_path = $path;
            $user->save();
            return redirect()->back()->with('success', 'Digital Signature has been added successfully');
        } else {
            return redirect()->back()->with('errors', 'Error Occurred while uploading an Image');

        }


    }

    public function show($id = null)
    {
        $id = isset($id) ? decode_id($id) : Auth::id();
        $data['user'] = $user = User::find($id);

        $role_where_not = [];
        if ($user->hasAnyRole('organisation-admin')) {
            $role_where_not = ['super-admin', 'admin', 'organisation-admin'];
        }
        if ($user->hasAnyRole('admin')) {
            $role_where_not = ['super-admin'];
        }

        $data['roles'] = Roles::whereNotIn('name', $role_where_not)->get();

        if (Auth::user()->hasAnyRole('super-admin|admin')) {
            return view('user-management::limitless.view.index', $data);
        } else {

            if (Auth::user()->hasRole('organisation') && UsersInnerJoin::where(array('user_id' => $id, 'join_id' => Auth::user()->organisationid))->doesntExist()) {
                return redirect()->back()->withErrors('You can\'t access this user');
            }

            return view('user-management::limitless.view.index-public', $data);
        }
    }

    public function profileSecurity($id = null)
    {
        $id = isset($id) ? decode_id($id) : Auth::user()->id;
        $data['user'] = User::find($id);
        return view('user-management::limitless.view.profile_security', $data);
    }

    public function loginActivity($id = null)
    {
        $id = isset($id) ? decode_id($id) : Auth::user()->id;
        $data['user'] = User::find($id);
        return view('user-management::limitless.view.login_activity', $data);
    }


    public function update_profile(Request $request)
    {
        $rules = [
            //'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:100', 'required'],
            'last_name' => ['required', 'string', 'max:100', 'required'],
            'phone' => ['required', 'string', 'max:20'],
            //            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //            'roles' => ['array'],
        ];


        if (strlen($request->password) > 0) {
            $rules['current_password'] = [
                'required',
                //                new CurrentPassword(),
                'different:password'
            ];
        }

        $user = User::find($request->user_id);
        //$user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->email;
        $user->phone = phone($request->phone);
        strlen($request->password) > 0 ? $user->password = Hash::make($request->password) : '';
        $user->save();

        if (isset($request->portal_roles) && !empty($request->portal_roles)) {

            $user->assignRole($request->portal_roles);
        }

        if (isset($request->roles) && !empty($request->roles)) {
            $user->assignRole($request->roles);
            (in_array('permanent-secretary', $request->roles) || in_array('registry-attendant', $request->roles)) && !in_array('organisation', $request->roles) ? $user->assignRole('organisation') : '';
        }


        //login the user immediately they change password successfully
        //strlen($request->password) > 0 ? Auth::login($user) : '';

        //return redirect()->back()->with('success', 'User account has been Updated Successfully');
        return redirect('admin/users/' . encode_id($user->id))->with('success', 'User account has been Updated Successfully');

    }

    public function destroy()
    {
    }

    public function profilePicture($size)
    {
        $photo = Auth::user()->photo;

        if (isset($photo)) {
            $path = $photo->photo;
            $path_array = explode("/", $path);
            $file_name = end($path_array);

            $img = Image::make('storage/users/' . Auth::id() . '/' . $file_name);

            // prevent possible upsizing
            $img->resize(null, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // save image in desired format
            $img->save('storage/profile_pictures/' . $file_name);

            return $img->response('jpg');
        } else {
            return Image::make('images/placeholder.jpg')->response('jpg');
        }
    }

    function deleteUserRole($id, $role)
    {

        if (Auth::user()->hasRole('super-admin')) {
            $user = User::find(decode_id($id));
            $user->removeRole($role);
        }
        return redirect()->back()->with('success', 'Role successfully removed from user');
    }


}
