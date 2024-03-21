<?php


namespace Admin\UserManagement\Traits;

use Spatie\Permission\Models\Permission;


trait PermissionTrait
{
    public function permissions()
    {
        return Permission::all();
    }

    public function customPermissions()
    {
        $Permissions = Permission::all();
        $permissionsArray = [];

        foreach ($Permissions as $Permission) {
            $parts = explode('.', $Permission->name);
            $last = array_pop($parts);
            $parts = array(implode('.', $parts), $last);
            $permissionsArray[$parts[0]][$Permission->id] = $parts[1];
        }

        return $permissionsArray;
    }


    public function rgPermissionHumanReadableName($value)
    {
        $value = ucwords(str_ireplace('.', ': ', $value));
        return str_ireplace('-', ' ', $value);
    }


}
