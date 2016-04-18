<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaymentDetailsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();
        
        $method = [
            "Credit/Debit Card",
            "PayPal",
            "Cash On Delivery"
        ];

        for ($i = 0; $i < 3; $i++) {
            DB::table('payment_details')->insert([
                'method' => $method[$i],
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }

}
