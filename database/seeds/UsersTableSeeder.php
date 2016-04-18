<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'facebook_id' => $faker->numerify('###############'), //15
                'kakaotalk_id' => $faker->numerify('#########'), //9
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'role' => rand(0, 1),
                'phone' => $faker->numerify('+60 1## ####'),
                'verification_status' => $faker->boolean($chanceOfGettingTrue = 80),
                'facebook_profile_pic' => $faker->imageUrl($width = 640, $height = 480),
                'kakaotalk_profile_pic' => $faker->imageUrl($width = 640, $height = 480),
                'profile_pic' => $faker->imageUrl($width = 640, $height = 480),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'information' => $faker->sentence($nbWords = 10, $variableNbWords = true),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

//        DB::table('users')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
    }

}
