<?php

namespace Admin\UserManagement\database\seeds;

use Illuminate\Database\Seeder;
use Admin\UserManagement\Models\Group;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Group::create([
            'name' => 'Super Administrator',
            'description' => 'This group has a maximum of one user and has ALL permissions'
        ]);
        $group->roles()->create([
            'group_id' => $group->id,
            'role' => 'super-admin'
        ]);
        $group->roles()->create([
            'group_id' => $group->id,
            'role' => 'admin'
        ]);

    }
}
