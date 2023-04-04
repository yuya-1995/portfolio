<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id');
            $table->string('shop_name')->default('空');
            $table->string('shop_address')->default('空');
            $table->string('at1st')->default('空');
            $table->string('at2nd')->default('空');
            $table->string('at3rd')->default('空');
            $table->integer('loss_alert')->default(null);

            $table->unsignedBigInteger('users_id');
            $table->timestamps();
            
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
