<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewbook', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable(false);
            $table->uuid('uid_book');
            $table->string('slug');
            $table->string('url');
            $table->string('session_id');
            $table->uuid('user_id');
            $table->string('ip');
            $table->string('agent');
            $table->string('platform');
            $table->string('device');
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
        Schema::dropIfExists('viewbook');
    }
}
