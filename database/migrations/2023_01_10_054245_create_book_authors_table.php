<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_authors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();

            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onDelete('cascade');

            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_authors');
    }
}
