<?php

namespace  Database\Factories\Admin\Messages\Models;

use Admin\CustomerRequests\Models\CustomerRequest;
use Admin\Messages\Models\MessageOutbox;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class MessageOutboxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageOutbox::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



    public function definition()
    {
//        $faker = Faker\Factory::create('en_UG');
        return [
            'to_user' =>'256'.$this->faker->regexify('09[0-9]{9}'),//25609798669577
            'm_type' => Arr::random(['sms','email']),
            'subject' =>Arr::random(['Initiated-Dose','Uninitiated-Dose']),
            'message' =>$this->faker->text,
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }


}
