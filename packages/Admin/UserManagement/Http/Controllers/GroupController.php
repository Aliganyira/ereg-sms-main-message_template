<?php

namespace Admin\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use  Admin\UserManagement\Models\Group;
use  Admin\UserManagement\Models\GroupUser;
use  Admin\UserManagement\Models\GroupRole;
use  Admin\UserManagement\Traits\PermissionTrait;

class GroupController extends Controller
{

    use PermissionTrait;
    public function index()
    {
        $data = [
            'groups' => \Admin\UserManagement\Models\Group::all(),
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.group.index', $data);
    }

    public function create()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];

        return view('user-management::limitless.group.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'unique:groups'],
            //'permissions' => 'required|array',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return redirect()->back()->with('success', 'Group created');
    }

    public function show($txnId) {}

    public function edit($txnId) {}

    public function update(Request $request) {}

    public function destroy() {}

    public function assignCreate()
    {
        $data = [
            'selectGroups' => false,
            'groups' => Group::all(),
            'users' => User::all(),
            'user' => null,
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.group.assign', $data);
    }

    public function assignOnSelectUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->groupsArray = []; //$user->groups->pluck('id')->toArray();
        $data = [
            'selectGroups' => true,
            'groups' => Group::all(),
            'users' => [],
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.group.assign', $data);
    }

    public function assignStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'group_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect(route('groups.assign'))->withErrors($validator);
        }

        //$user = User::find($request->user_id);

        //check if user is in the group
        $check = \Admin\UserManagement\Models\GroupUser::where('user_id', $request->user_id)->where('group_id', $request->group_id)->first();

        if ($check) {
            //do nothing because record exists
            return redirect(route('groups.assign'))->withErrors(['User already in Group']);
        } else {
            $groupUser = new GroupUser;
            $groupUser->user_id = $request->user_id;
            $groupUser->group_id = $request->group_id;
            $groupUser->save();

            return redirect(route('groups.assign'))->with('success', 'Group assigned to user');
        }

    }
}
