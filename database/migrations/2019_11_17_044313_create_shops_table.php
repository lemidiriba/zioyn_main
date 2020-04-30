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
            $table->bigIncrements('id');
            $table->string('shop_name');
            $table->string('shop_description');
            $table->unsignedBigInteger('shop_category_id');
            $table->unsignedBigInteger('shop_owner_id');
            $table->unsignedBigInteger('shop_tin_number')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->foreign('shop_owner_id')->references('id')->on('users');
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->foreign('shop_category_id')->references('id')->on('shop_categories');
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