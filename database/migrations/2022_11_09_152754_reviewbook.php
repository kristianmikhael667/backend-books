<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reviewbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewbook', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable(false);
            $table->uuid('user_uid');
            $table->uuid('book_uid');
            $table->text('comment')->nullable();
            $table->double('total_review');
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
        Schema::dropIfExists('reviewbook');
    }
}
