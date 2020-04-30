<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('shop_owners_id');
            $table->timestamps();
        });


        Schema::table('shop_owners', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops');
        });


        Schema::table('shop_owners', function (Blueprint $table) {
            $table->foreign('shop_owners_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_owners');
    }
}
