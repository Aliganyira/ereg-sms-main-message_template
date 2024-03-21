<?php
namespace Database\Seeders;
use Admin\Apis\Database\Seeds\PostaSeeder;
use Admin\MailSubjects\Database\Seeds\MailSubjectSeeder;
use Admin\Organisations\Database\Seeds\OrganisationUsersSeeder;
use Admin\UserManagement\database\seeds\UsersTableSeeder;
use Illuminate\Database\Seeder;
use Admin\UserManagement\database\seeds\RolesAndPermissionsSeeder;
use Admin\UserManagement\database\seeds\GroupsSeeder;
use Admin\SystemSettings\database\seeds\SettingsSeeder;
use Admin\Organisations\Database\Seeds\OrganisationsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Please note users seed must always come after the permissions and roles seder
        $this->call(StaticDataSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsSeeder::class);


        /**Please note this should be put last always **/

    }
}
