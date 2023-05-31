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
        Schema::create('TrBorrowedBooks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dueDate');
            $table->boolean('isReturned');
            $table->unsignedBigInteger('bookId');
            $table->unsignedBigInteger('userId');
            $table->foreign('bookId')->references('id')->on('MsBooks');
            $table->foreign('userId')->references('id')->on('MsUsers');
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
        Schema::dropIfExists('borrowed_books');
    }
}
