<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Receipt;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Receipt::class, function (Faker $faker) {
    return [
        // 'receipt_no' => $faker->unique()->randomNumber,
        // 'receipt_content' => $faker->randomLetter,
        // 'receipt_total_balance' => $faker->numberBetween($min = 1000, $max = 9000),
        // 'receipt_date' => Carbon::now()->format('m/d/Y h:i A'),
        // 'receipt_time' => Carbon::now()->format('h:i A'),
        // 'customer' => $faker->firstNameMale,
        // 'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
        // 'created_date' => Carbon::now()->format('m/d/Y'),
        // 'created_time' => Carbon::now()->format('h:i A'),
        // 'user_id' => 1
    ];
});
