<?php


namespace Admin\UserManagement\Models;


use App\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Admin\UserManagement\Models\GroupRole;

class Roles extends BaseModel
{
    protected $table = 'roles';

    function group_role(){
        return $this->hasOne(GroupRole::class,'role','name');
    }
}
