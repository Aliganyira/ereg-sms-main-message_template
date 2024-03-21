<?php
namespace Admin\UserManagement\database\seeds;
use App\Models\Users;
use App\User as User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Admin\UserManagement\Models\UserDetails;


class UsersTableSeeder extends Seeder
{

    use HasFactory;

    protected $domain_name;

    public function __construct()
    {
        $this->domain_name = 'ereg.ifms.go.ug';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@mail.com',
            'username' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'remember_token' => Str::random(10),
        ]);
        $superAdmin->assignRole('super-admin');

        $tamale = User::create([
            'first_name' => 'Dennis',
            'last_name' => 'Tamale',
            'email' => 'tamaledns@gmail.com',
            'username' => 'tamaledns@gmail.com',
            'phone'=>'256703970431',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'remember_token' => Str::random(10),
        ]);
        $tamale->assignRole('super-admin');

    }

}
