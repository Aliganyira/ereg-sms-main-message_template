<?php

namespace Admin\UserManagement\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Admin\UserManagement\Models\GroupRole;

class Group extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';

    protected $primaryKey = 'id';

    public function roles()
    {
        return $this->hasMany(GroupRole::class, 'group_id'); //->orderBy('id', 'asc');
    }

}
