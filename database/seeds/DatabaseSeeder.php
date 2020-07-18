<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
// use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // //Faker for customers
        // foreach(range(1, 100) as $index){
        //     DB::table('customers')->insert([
        //         'name'=>$faker->name,
        //         'email'=>$faker->email,
        //         'country' => $faker->country,
        //         'phonenumber' => $faker->phonenumber,
        //         'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
        //         'created_date' => Carbon::now()->format('m/d/Y'),
        //         'created_time' => Carbon::now()->format('h:i A'),
        //         'user_id' => 1
        //     ]);

            // //Faker for invoice
            // DB::table('invoices')->insert([
            //     'invoice_no' => $faker->unique()->randomNumber,
            //     'invoice_content' => $faker->randomLetter,
            //     'invoice_total_balance' => $faker->numberBetween($min = 1000, $max = 9000),
            //     'invoice_date' => Carbon::now()->format('m/d/Y h:i A'),
            //     'invoice_time' => Carbon::now()->format('h:i A'),
            //     'customer' => $faker->firstNameMale,
            //     'created_datetime' => Carbon::now()->format('m/d/Y h:i A'),
            //     'created_date' => Carbon::now()->format('m/d/Y'),
            //     'created_time' => Carbon::now()->format('h:i A'),
            //     'user_id' => 1
            // ]);

        $this->call(CustomerSeeder::class);
        $this->call(InvoiceSeeder::class);
    }
}
