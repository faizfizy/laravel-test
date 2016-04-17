<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60); //hashed
            $table->string('facebook_id');
            $table->string('kakaotalk_id');
            $table->tinyInteger('role');
            $table->string('phone', 20)->unique();
            $table->boolean('verification_status');
            $table->string('facebook_profile_pic');
            $table->string('kakaotalk_profile_pic');
            $table->string('profile_pic');
            $table->text('description');
            $table->text('information');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
