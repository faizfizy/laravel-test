<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotificationsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('notifications')->insert([
                'type' => $faker->numberBetween($min = 1, $max = 9),
                'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'seen' => $faker->boolean(),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }

}
