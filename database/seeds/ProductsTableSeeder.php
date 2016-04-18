<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Category;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();
        
        $names = [
            1 => "SoKaNo Trendz SKN803 Premium PU Leather Bag",
            2 => "Shake N' Take Blender 2 Bottles",
            3 => "5 In 1-Stainless Steel Food Container",
            4 => "PREMA Premium Butterfly Fashion Watch",
            5 => "Mamypoko Extra Dry Diaper Super Jumbo Pack Combo XL44 (3 packs)",
            6 => "Mamil Mama 600g (Fine Cocoa variant)",
            7 => "MANGO Quilted Chain Sling Bag",
            8 => "Dell 088W9X Essential 15.6' Backpack",
            9 => "Bayers Belgium Waffle Maker WM-20",
            10 => "Curren Men's Brown Leather Strap Watch 8152"
        ];
        
        $desc = [
            1 => "SoKaNo Trendz SKN803 Premium PU Leather Bag. Trendy and elegant design with Red and Black colour. Premium PU Leather material- Ultralight, durable and waterproof. Multi zipped design and larga capacity. Can fix tablet, smart phone, long wallet and etc. Come with a free plush key chain. Suitable for outing, shopping, working, school and etc.",
            2 => "3 Months Local Manufacturer Warranty. Product is not eligible for voucher. 16-oz. 180 W. Stainless steel blades. Non-slip rubber feet.",
            3 => "Product is not eligible for voucher. Stainless steel food containers. With clear lid. Set of 5.",
            4 => "14 days Local Supplier Warranty. Specially designed analog watch draws much attention from buyers. Amazing looking watch, can be a great gift for friends. Precise movement and keep good time. Fashionable and very charming for all occasions. Solid stainless steel back cover. Suitable for both men and women. Water spill resistant. Compact watchband for comfortable wearing.",
            5 => "Product is not eligible for voucher. Easy to use. Speed wave pads absorb better. Breathable cover.",
            6 => "Product is not eligible for voucher. Formulated with the right levels of Folic Acid. Contains DHA, Calcium, Vitamin B1 and B2, Iron.",
            7 => "Synthetic leather. Sling drop: 39cm. Button closure. One inner zip compartment.",
            8 => "No Warranty. Protection - Protect your laptop from scuffs, scratches & dust. Compatibility - Dell Laptop up to 15.6'. Functionality - Ample storage for documents and other necessities;outer pocket keeps keys, cellphone or wallet within reach; side mesh pockets allow quick access for water bottle and umbrella; complete with easy grab top handle and padded shoulder straps.",
            9 => "6 Months Local Supplier Warranty. Dual function base. Nonstick interior. Four easy to cut sections. LED indicator.",
            10 => "4 Months Local Manufacturer Warranty. Warranty : 4 Month. Round dial with Arabia scales for displaying time. Precise quartz movement. Leather band can be adjustable. Common level of 3ATM water resistant."
        ];
        
        $prices = [
            1 => 69.90,
            2 => 36.90,
            3 => 11.90,
            4 => 21.00,
            5 => 145.50,
            6 => 34.90,
            7 => 49.90,
            8 => 35.00,
            9 => 49.90,
            10 => 27.90
        ];
        
        $cat_id = [
            1 => "Fashion",
            2 => "Home Appliances",
            3 => "Home & Living",
            4 => "Fashion",
            5 => "Baby, Toys",
            6 => "Baby, Toys",
            7 => "Fashion",
            8 => "Travel & Luggage",
            9 => "Home Appliances",
            10 => "Fashion"
        ];
        
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => $names[$i],
                'description' => $desc[$i], //$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'price' => $prices[$i],
                'out_of_stock' => $faker->boolean($chanceOfGettingTrue = 80),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'user_id' => User::select('id')->orderByRaw('RAND()')->value('id'),
                'category_id' => Category::select('id')->where('name', $cat_id[$i])->value('id'),
            ]);
        }
    }

}
