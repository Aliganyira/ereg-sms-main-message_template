<?php

namespace Admin\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use  Admin\UserManagement\Traits\PermissionTrait;

class RoleController extends Controller
{

    use PermissionTrait;


    public function index()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => $this->permissions(),
        ];
        return view('user-management::limitless.roles.index', $data);
    }

    public function create()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];

        return view('user-management::limitless.roles.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'permissions' => 'required|array',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $role = Role::create([
            //'tenant_id' => Auth::user()->tenant->id,
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Role created');
    }

    public function show($id)
    {
        $data = [
            'users' => User::all(),
            'role' => Role::find($id),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.roles.show', $data);
    }

    public function edit($txnId) {}

    public function update(Request $request) {}

    public function destroy() {}

    public function assignCreate()
    {
        $data = [
            'selectRoles' => false,
            'users' => User::all(),
            'user' => null,
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.roles.assign', $data);
    }

    public function assignOnSelectUser(Request $request)
    {
        $user = User::find($request->user_id);
        $data = [
            'selectRoles' => true,
            'users' => [],
            'user' => $user,
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.roles.assign', $data);
    }

    public function assignStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'role_ids' => 'array',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect(route('roles.assign'))->withErrors($validator);
        }

        $user = User::find($request->user_id);

        if ($request->role_ids) {
            $user->syncRoles($request->role_ids);
        } else {
            $user->syncRoles([]);
        }

        return redirect(route('roles.assign'))->with('success', 'Role(s) assigned to user');
    }
}
