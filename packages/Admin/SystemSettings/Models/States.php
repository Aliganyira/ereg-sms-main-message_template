<?php

namespace Admin\SystemSettings\Models;

use Admin\DeliveryAgents\Models\DeliveryAgent;
use App\BaseModel;
use Illuminate\Support\Facades\DB;

class States extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'state';

    protected $primaryKey = 'id';

}
