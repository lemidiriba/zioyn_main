<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'product_types',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('type_name');
                $table->unsignedBigInteger('product_brands_id');
                $table->unsignedBigInteger('users_id');
                $table->timestamps();
            }
        );

        Schema::table(
            'product_types',
            function (Blueprint $table) {
                $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('product_types');
    }
}