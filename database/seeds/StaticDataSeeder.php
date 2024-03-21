<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaticDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->truncateStaticTables();

        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents('uploads/static_data/static_data.sql'));
        DB::unprepared(file_get_contents('uploads/static_data/state.sql'));
    }

    public function truncateStaticTables()
    {
        DB::table('country')->truncate();
    }
}
