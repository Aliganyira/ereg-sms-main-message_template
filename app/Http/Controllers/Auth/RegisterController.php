<?php

namespace App\Http\Controllers\Auth;

use Admin\SystemSettings\Traits\AdminUnitsTrait;
use Admin\UserManagement\Models\UserDetails;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers,AdminUnitsTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nin' => ['required', 'string', 'min:14', 'max:14', 'unique:users'],
            'phone' => ['required', 'string', 'min:10'],
            'gender' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'district_id' => ['required','integer'],
            'subcounty_id' => ['required','integer'],
            'parish_id' => ['required','integer'],
            'village_id' => ['required','integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nin' => $nin = $data['nin'],
            'username' => $nin,
            'phone' => phone($data['phone']),
            'email' => empty($data['email']) ? '-' : $data['email'],
            'password' => Hash::make($data['password']),
            'admin_assigned_role' =>'group-representative',
            'admin_assigned_role_activated' =>'no',
            'current_role' =>'none',
            'gender' =>$data['gender']
        ]);

        $user->assignRole('group-representative');


        $userdetails = new UserDetails();
        $userdetails->user_id = $user->id;
        $userdetails->district_id = $data['district_id'];
        $userdetails->subcounty_id = $data['subcounty_id'];
        $userdetails->parish_id = $data['parish_id'];
        $userdetails->village_id = $data['village_id'];
        $userdetails->save();

        return $user;
    }

    public function showRegistrationForm()
    {
        $data['districts'] = $this->Districts();
        return view('auth.register',$data);
    }

}
