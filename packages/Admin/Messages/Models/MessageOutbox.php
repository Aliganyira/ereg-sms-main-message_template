<?php

namespace Admin\Messages\Models;

use Admin\Participants\Models\Participant;
use App\BaseModel;
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
class MessageOutbox extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use HasFactory;
    protected $table = 'messages_outbox';

    protected $primaryKey = 'id';
//    protected $fillable=['to_user','subject','m_type','message','status','message_id','created_by','updated_by'];


    function participant(){
        return $this->belongsTo(Participant::class,'to_user','phone');
    }

}
