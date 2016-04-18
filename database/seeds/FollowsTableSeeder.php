<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class FollowsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('follows')->insert([
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => \Carbon\Carbon::now(),
                
                'user_id' => User::select('id')->orderByRaw('RAND()')->value('id'),
                'followed_id' => User::select('id')->orderByRaw('RAND()')->value('id'),
            ]);
        }
    }

}
