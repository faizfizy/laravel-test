<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Cart;
use App\Product;

class OrdersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                'quantity' => $faker->numberBetween($min = 1, $max = 24),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'product_id' => Product::select('id')->orderByRaw('RAND()')->value('id'),
                'cart_id' => Cart::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
