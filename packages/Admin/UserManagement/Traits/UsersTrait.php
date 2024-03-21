<?php
namespace Admin\UserManagement\Traits;

use Admin\UserManagement\Models\UsersInnerJoin;
use App\User;

trait UsersTrait
{
    public function ninExists($nin)
    {
            $ninCheckLevel2 = User::where('nin', $nin)->exists();
            if ($ninCheckLevel2) {
                return 'true';
            } else {
                return 'false';
            }
    }



    public function create_user_join($user_id, $join_id,$join_type='organisation')
    {
        UsersInnerJoin::create([
            'user_id' => $user_id,
            'join_id' => $join_id,
            'join_type' => $join_type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


}
