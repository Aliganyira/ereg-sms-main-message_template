<?php

namespace Admin\SystemSettings\Models;

use Admin\DeliveryAgents\Models\DeliveryAgent;
use App\BaseModel;
use Illuminate\Support\Facades\DB;

class StatusStyles extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status_styles';

    protected $primaryKey = 'id';

}
