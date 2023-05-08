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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('空');

            // $table->bigIncrements('shop_id')->unsigned();
            $table->rememberToken();
            // $table->unsignedBigInteger('shop_id');
            $table->timestamps();

            // $table->foreign('shop_id')->references('id')->on('shop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
        Schema::dropIfExists('skill_user');
        Schema::dropIfExists('items');
        Schema::dropIfExists('shops');
        Schema::dropIfExists('users');
    }
}
