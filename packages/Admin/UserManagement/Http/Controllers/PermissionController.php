<?php

namespace Admin\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use  Admin\UserManagement\Traits\PermissionTrait;

class PermissionController extends Controller
{

    use PermissionTrait;
    public function index()
    {
        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.permissions.index',$data);
    }

    public function create(Request $request)
    {
        if ($request->user_id) {
            $user = User::find($request->user_id);
        } elseif ($request->session()->get('user_id')) {
            $user = User::find($request->session()->get('user_id'));
        } else {
            $user = User::first();
        }

        //$user->givePermissionTo('campaigns.view');

        //$permissions = $user->getAllPermissions();

        //print_r($permissions); exit;

        return view('user-management::limitless.permissions.create')->with([
            'permissions_array' => rg_permissions_array(),
            'users' => User::all(),
            'user' => $user,
        ]);

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'permissions' => 'array',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect(route('permissions.assign'))->withErrors($validator);
        }

        $user = User::find($request->user_id);

        if ($request->permissions) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]);
        }

        return redirect(route('permissions.assign'))->with('success', 'User assigned permissions');
    }

    public function show($id)
    {}

    public function edit($id)
    {}

    public function update(Request $request)
    {}

    public function assignCreate()
    {
        $data = [
            'selectPermissions' => false,
            'users' => User::all(),
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.permissions.assign',$data);
    }


    public function assignOnSelectUser(Request $request)
    {
        $user = User::find($request->user_id);
        $data = [
            'selectPermissions' => true,
            'users' => [],
            'user' => $user,
            'permissions' => $this->customPermissions(),
        ];
        return view('user-management::limitless.permissions.assign', $data);
    }

    public function assignStore()
    {
        return Permission::count();
    }


}
