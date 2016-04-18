<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class DevicesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('devices')->insert([
                'generated_id' => $faker->numberBetween($min = 1000000000, $max = 9999999999), //10
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'user_id' => User::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
