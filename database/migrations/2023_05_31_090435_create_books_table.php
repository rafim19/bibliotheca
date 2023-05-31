<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('book_categories');

            $table->integer('quantity')->default(0);
            $table->string('isbn');
            $table->string('publisher');
            $table->year('release_year');
            $table->integer('edition')->default(1);
            $table->string('language');
            $table->integer('borrowed_count')->default(0);
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
        Schema::dropIfExists('books');
    }
}
