<?php

namespace Admin\SystemSettings\database\seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->warn('Please wait updating Status Styles...');
        DB::unprepared(file_get_contents('uploads/static_data/status_styles.sql'));
        $this->command->info('Updating the Status Styles data completed !');

    }
}
