<?php

namespace Front\PublicUi\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Front\PublicUi\Models\PublicUi;

class PublicUiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublicUi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function fields()
    {
        $faker = Factory::create('en_UG');
        return [
            'id' => rand(1),
        ];
    }

    public function states()
    {
        // TODO: Implement states() method.
    }
}
