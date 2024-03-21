<?php

namespace Admin\Messages\Models;

use Admin\Participants\Models\Participant;
use App\BaseModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package Messages\Models
 *
 * @property int $id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class MessageInbox extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    protected $table = 'messages_inbox';

    protected $primaryKey = 'id';
    protected $fillable=['msisdn','subject','shortcode','message','replied'];

    function participant(){
        return $this->hasOne(Participant::class,'phone','msisdn');
    }

    function moderator(){
        return $this->belongsTo(User::class,'moderated_by');
    }


}
