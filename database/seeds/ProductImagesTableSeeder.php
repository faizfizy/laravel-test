<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Product;

class ProductImagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('product_images')->insert([
                'image' => $faker->imageUrl($width = 640, $height = 480),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'product_id' => Product::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
