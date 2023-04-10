<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name')->default('空');
            $table->integer('item_num');
            $table->string('stock_at')->default('空');
            $table->string('item_price')->default('空');
            $table->dateTime('item_loss');
            $table->string('user_name')->default('空');

            $table->unsignedBigInteger('shop_id');
            $table->timestamps();
            
            $table->foreign('shop_id')->references('shop_id')->on('shops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
