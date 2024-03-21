<?php

namespace Front\PublicUi\Models;

use App\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PublicUi
 * @package PublicUi\Models
 *
 * @property int $id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class PublicUi extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'public_uis';

    protected $primaryKey = 'id';
}
