<?php

namespace  Database\Factories\Admin\Messages\Models;

use Admin\CustomerRequests\Models\CustomerRequest;
use Admin\Messages\Models\MessageInbox;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class MessageInboxFactory extends Factory
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
//        $faker = Faker\Factory::create('en_UG');
        return [
            'msisdn' =>'256'.$this->faker->regexify('09[0-9]{9}'),//25609798669577
            'shortcode' => rand(6000,7000),
            'subject' =>Arr::random(['Initiated-Dose','Uninitiated-Dose']),
            'message' =>$this->faker->text,
            'replied' => Arr::random(['N','Y']),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }


}
