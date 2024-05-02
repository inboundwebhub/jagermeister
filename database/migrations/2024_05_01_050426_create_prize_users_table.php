<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prize_id');
            $table->string('prize_type');
            $table->unsignedBigInteger('user_id');
            $table->text('user_proof');
            $table->timestamps();

            // Define foreign key constraints if needed
            $table->foreign('prize_id')->references('id')->on('prizes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_user');
    }
}
