<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Customer::class, function (Faker $faker) {
    return [

            'name'=>$faker->name,
            'email'=>$faker->email,
            'country' => $faker->country,
            'phonenumber' => $faker->phonenumber,
            'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
            'created_date' => Carbon::now()->format('m/d/Y'),
            'created_time' => Carbon::now()->format('h:i A'),
            'user_id' => 1
    ];
});
