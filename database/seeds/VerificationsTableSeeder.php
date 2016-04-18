<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class VerificationsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('verifications')->insert([
                'code' => $faker->numberBetween($min = 100000, $max = 999999), //6
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'phone' => User::select('phone')->where('id', ($i + 1))->value('phone'), //seed will fail if it runs twice
            ]);
        }
    }

}
