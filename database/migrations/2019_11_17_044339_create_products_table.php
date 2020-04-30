<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_amount');
            $table->double('price');
            $table->unsignedBigInteger('product_detail_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('shop_id');
            $table->tinyInteger('available')->default(1);
            $table->timestamps();
        });

        // Schema::table('products', function (Blueprint $table) {
        //     $table->foreign('product_detail_id')->references('id')->on('product_details');
        // });

        // Schema::table('products', function (Blueprint $table) {
        //     $table->foreign('product_type_id')->references('id')->on('product_types');
        // });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
