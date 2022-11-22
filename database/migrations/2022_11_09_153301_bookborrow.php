<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookborrow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookborrow', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable(false);
            $table->uuid('user_uid');
            $table->uuid('book_uid');
            $table->integer('qty');
            $table->string('code_book');
            $table->enum('status_book', ['borrow', 'return', 'none', 'reject'])->default('none');
            $table->timestamp('date_borrow');
            $table->timestamp('date_return')->nullable();
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
        Schema::dropIfExists('bookborrow');
    }
}
