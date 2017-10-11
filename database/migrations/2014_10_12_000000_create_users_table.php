<?php

use Illuminate\Support\Facades\Schema;
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

            /**
             * Steam
             */
			$table->string('steamID64');
            $table->string('steamID');
            $table->string('avatar')->nullable();
            $table->string('realName')->nullable();

            /**
             * Clan Information
             */
            $table->integer('clanID')->nullable();


			$table->string('installDir')->nullable();
			$table->string('comment')->nullable();

            $table->string('remark')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
