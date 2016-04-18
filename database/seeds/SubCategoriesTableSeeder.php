<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;

class SubCategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();
        
        $subc = [
            1 => "Women's Bags",
            2 => "Small Kitchen Appliances",
            3 => "Laptop Backpacks",
            4 => "Women's Shoes",
            5 => "Men's Bags",
            6 => "Men's Shoes",
            7 => "Blenders, Mixers & Grinders",
            8 => "Toasters & Sandwich Makers",
            9 => "Baby Gear",
            10 => "Diapering & Potty",
        ];
        
        $cat_id = [
            1 => "Fashion",
            2 => "Home Appliances",
            3 => "Travel & Luggage",
            4 => "Fashion",
            5 => "Fashion",
            6 => "Fashion",
            7 => "Home Appliances",
            8 => "Home Appliances",
            9 => "Baby, Toys",
            10 => "Baby, Toys",
        ];
                
                

        for ($i = 1; $i <= 10; $i++) {
            DB::table('sub_categories')->insert([
                'name' => $subc[$i],
                'image' => $faker->imageUrl($width = 640, $height = 480),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'category_id' => Category::select('id')->where('name', $cat_id[$i])->value('id'),
            ]);
        }
    }

}
