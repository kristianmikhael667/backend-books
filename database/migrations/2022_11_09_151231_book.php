<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable(false);
            $table->string('slug')->unique();
            $table->uuid('catalog_id');
            $table->string('author_book');
            $table->string('title_book');
            $table->string('publish_book');
            $table->text('sinopsis_book');
            $table->string('name_book');
            $table->string('cover_book', 2048)->nullable();
            $table->enum('status_book', ['active', 'non'])->default('active');
            $table->date('publish_date');
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
        Schema::dropIfExists('book');
    }
}
