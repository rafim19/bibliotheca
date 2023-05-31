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
        Schema::create('MsUsers', function (Blueprint $table) {
            $table->id();
            $table->char('nim', 10);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('domicile');
            $table->string('phoneNumber')->unique();
            $table->string('faculty');
            $table->string('major');
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
