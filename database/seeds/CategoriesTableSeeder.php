<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //seed should only be run once
        $faker = Faker::create();

        $cat = [
            1 => "Home Appliances",
            2 => "Fashion",
            3 => "Home & Living",
            4 => "TV, Gaming, Audio, WT",
            5 => "Watches, Eyewear, Jewellery",
            6 => "Mobiles & Tablets",
            7 => "Cameras",
            8 => "Computers & Laptop",
            9 => "Travel & Luggage",
            10 => "Health & Beauty",
            11 => "Sports, Automotive",
            12 => "Baby, Toys",
        ];

        for ($i = 1; $i <= 12; $i++) {
            DB::table('categories')->insert([
            'name' => $cat[$i],
            'image' => $faker->imageUrl($width = 640, $height = 480),
                
            'created_at' => $faker->dateTimeThisYear($max = 'now'),
            'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }

}
