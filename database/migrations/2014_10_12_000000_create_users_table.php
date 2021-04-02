<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->default('img.jpg');
            $table->string('phone');
            $table->string('password');
            $table->string('country');
            $table->string('gender');
            $table->rememberToken();
            $table->timestamps();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('receptionist_id')->nullable();
            $table->string('role');
            $table->foreign('receptionist_id')
            ->references('id')->on('receptionists')
            ->onDelete('cascade')->default(null);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
