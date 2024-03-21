<?php

namespace Admin\Messages\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Admin\Messages\Models\MessageInbox;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageInbox::class;

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
