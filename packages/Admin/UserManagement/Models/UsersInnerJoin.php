<?php

namespace Admin\UserManagement\Models;

use App\BaseModel;
use App\User;
use Admin\Organisations\Models\Organisation;

class UsersInnerJoin extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_inner_join';

    protected $primaryKey = 'id';
    protected $fillable=['user_id','join_id','join_type'];

    public function users()
    {
        return $this->belongsTo(User::class, 'join_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'join_id');
    }

}
