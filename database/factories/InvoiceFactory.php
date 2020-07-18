<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
            'invoice_no' => $faker->unique()->randomNumber,
            'invoice_content' => $faker->randomLetter,
            'invoice_total_balance' => $faker->numberBetween($min = 1000, $max = 9000),
            'invoice_date' => Carbon::now()->format('m/d/Y h:i A'),
            'invoice_time' => Carbon::now()->format('h:i A'),
            'customer' => $faker->firstNameMale,
            'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
            'created_date' => Carbon::now()->format('m/d/Y'),
            'created_time' => Carbon::now()->format('h:i A'),
            'user_id' => 1
    ];
});
