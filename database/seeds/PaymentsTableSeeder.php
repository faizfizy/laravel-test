<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Cart;
use App\PaymentDetail;

class PaymentsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            $amt = $faker->randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 9999);

            DB::table('payments')->insert([
                'paid' => $faker->boolean,
                'tax_amount' => $amt * 0.1,
                'amount' => $amt,
                'refunded' => $faker->boolean($chanceOfGettingTrue = 20),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'user_id' => User::select('id')->orderByRaw('RAND()')->value('id'),
                'cart_id' => Cart::select('id')->orderByRaw('RAND()')->value('id'),
                'payment_detail_id' => PaymentDetail::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
