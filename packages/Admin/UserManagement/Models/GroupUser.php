<?php

namespace Admin\UserManagement\Models;

use App\BaseModel;
use Illuminate\Support\Facades\DB;
use App\User;
use Admin\UserManagement\Models\Group;

class GroupUser extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_users';

    protected $primaryKey = 'id';

    function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
