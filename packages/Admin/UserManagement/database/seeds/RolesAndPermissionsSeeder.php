<?php

namespace Admin\UserManagement\database\seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SA Menu
        $permissions = [
            //Super-admins
            'super-admin.create',
            'super-admin.view',
            'super-admin.update',
            'super-admin.void',

            //Notifications
            'notifications.view',
            'notifications.create',

            //Users
            'users.create',
            'users.view',
            'users.update',
            'users.void',

            //Reports
            'reports.view',
            'reports.export',
            'reports.manage',
            'reports.create',

            //Audit-Logs
            'audit-logs.create',
            'audit-logs.view',
            'audit-logs.update',
            'audit-logs.void',

            //Messages
            'messages.create',
            'messages.view',
            'messages.update',
            'messages.void',
        ];


        // Reset cached roles and permissions
        //app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions

        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([
            //Super-admins
            'super-admin.create',
            'super-admin.view',
            'super-admin.update',
            'super-admin.void',

            //Audit-Logs
            'audit-logs.view',
            'audit-logs.void',

            //Users
            'users.create',
            'users.view',
            'users.update',
            'users.void',

            //Messages
            'messages.create',
            'messages.view',
            'messages.update',
            'messages.void',

        ]);

        //Just Portal Access
        $portal_access = Role::firstOrCreate(['name' => 'portal-access']);

    }

}
