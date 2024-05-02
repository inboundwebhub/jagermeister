<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivePrizesTable extends Migration
{
    public function up()
    {
        Schema::create('live_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prize_id');
            $table->string('prize_number');
            $table->string('prize_type');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('live_prizes');
    }
}
