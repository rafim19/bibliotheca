<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->char('user_id', 10);
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_id')->references('nim')->on('users');

            $table->dateTime('borrowed_date');
            $table->dateTime('due_date');
            $table->dateTime('returned_date')->nullable();
            
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
        Schema::dropIfExists('borrowed_books');
    }
}
