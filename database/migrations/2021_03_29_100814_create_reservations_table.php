<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');      ///foriegn key to the users table  
            $table->foreign('user_id')->nullable()
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('room_id');           ///foriegn key to the rooms table  
            $table->foreign('room_id')->nullable()
            ->references('id')->on('rooms')
            ->onDelete('cascade');
            $table->integer('room_num');
            $table->integer('accompany_number');
            $table->integer('paid_price');
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
        Schema::dropIfExists('reservations');
    }
}
