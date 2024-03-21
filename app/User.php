<?php

namespace App;


use Admin\Organisations\Models\Organisation;
use Admin\UserManagement\Models\GroupRole;
use Admin\UserManagement\Models\UsersInnerJoin;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class User
 * @package App
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $nin
 * @property string $password
 * @property string $username
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasRoles, Notifiable, SoftDeletes, HasFactory;

    protected $appends = ['name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'username',
        'secondary_email',
        'security_qn',
        'security_ans',
        'captcha',
        'banned_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'banned_until',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];






    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getUserPermissionGroupAttribute()
    {
        $role_id = $this->roles->first()->id;
        $role = Role::find($role_id);
        return GroupRole::with('group')->where('role', $role->name)->first();
    }


    public function getOrganisationAttribute()
    {
        $results = UsersInnerJoin::where('user_id',$this->id)->where('join_type','organisation')->first();
        return isset($results) ? Organisation::find($results->join_id) : false;
    }


    public function getOrganisationIdAttribute()
    {
       return $results = UsersInnerJoin::where('user_id',$this->id)->where('join_type','organisation')->pluck('join_id')->first();
    }

    public function scopeOrganisationUsers($query,$organisation_id){

      return  $query->select('users.*')->leftJoin('users_inner_join','users_inner_join.user_id','=','users.id')->where('join_type','organisation')->where('join_id',$organisation_id)  ;
    }

    public function scopeDepartmentUsers($query,$department_id){
      return  $query->select('users.*')->leftJoin('users_inner_join','users_inner_join.user_id','=','users.id')->where('join_type','department')->where('join_id',$department_id);
    }

    public function scopeOfficeUsers($query,$office_id){
      return  $query->select('users.*')->leftJoin('users_inner_join','users_inner_join.user_id','=','users.id')->where('join_type','office')->where('join_id',$office_id);
    }


}
