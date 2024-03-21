<?php

namespace Front\PublicUi\Database\Seeds;

use Carbon\Carbon;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Front\PublicUi\Models\PublicUi;

class PublicUiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('en_UG');

        $publicUi = factory(PublicUi::class)->create([
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}
