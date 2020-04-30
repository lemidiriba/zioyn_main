<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_details',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('products_id');
                $table->double('size');
                $table->string('colour');
                $table->string('production_date');
                $table->string('production_place');
                $table->string('created_by');

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}