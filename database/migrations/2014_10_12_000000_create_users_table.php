<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('firstname');
			$table->string('lastname');
			$table->string('username');
			$table->string('displayname')->nullable(); 
            $table->string('occupation')->nullable();
            $table->string('email')->unique(); 
            $table->timestamp('email_verified_at')->nullable();
			$table->text('bio')->nullable();
            $table->integer('role'); 
			$table->string('ig_link')->nullable();
			$table->string('tw_link')->nullable();
			$table->string('li_link')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
