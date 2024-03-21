<?php

namespace Admin\SystemSettings\Models;

use App\BaseModel;
use Illuminate\Support\Facades\DB;

class AdminUnitsType extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_type';

    protected $primaryKey = 'id';

}
