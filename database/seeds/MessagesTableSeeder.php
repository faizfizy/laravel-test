<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class MessagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('messages')->insert([
                'message' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'from' => User::select('id')->orderByRaw('RAND()')->value('id'),
                'to' => User::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
