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
            $table->char('nim', 10);
            $table->primary('nim');

            $table->string('name');
            $table->string('email')->unique();
            $table->char('password', 60);
            $table->string('gender');
            $table->string('domicile');
            $table->string('phone_number')->unique();
            $table->string('faculty');
            $table->string('major');
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
