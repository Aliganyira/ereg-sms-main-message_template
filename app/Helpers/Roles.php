<?php

if(!function_exists('role_name')){
    function role_name($role_code){

        $roles = Admin\UserManagement\Models\Roles::where('name',$role_code)->first();
        if(isset($roles->group_role->id)){
            return $roles->group_role->group->name;
        }
        //Fallback in case role is not defined in groups
        return humanize($role_code);
    }
}

