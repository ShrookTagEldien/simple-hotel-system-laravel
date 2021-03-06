<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('NationalID');
            $table->string('password');
            $table->string('banning')->default('Ban'); //Ban is used for view button txt directly so Ban means he's unbanned :D
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
        Schema::dropIfExists('receptionists');
    }
}