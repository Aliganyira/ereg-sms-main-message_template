<?php

namespace Admin\UserManagement\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Admin\UserManagement\Models\Group;

class GroupRole extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_roles';

    protected $primaryKey = 'id';

    function group(){
        return $this->belongsTo(Group::class,'group_id');
    }


}
