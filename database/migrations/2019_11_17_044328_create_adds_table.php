<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('addtype_id');
            $table->unsignedBigInteger('promoter_id');
            $table->string('add_name');
            $table->string('add_tagline');
            $table->string('add_image');
            $table->string('created_by');
            $table->timestamps();
        });

        Schema::table('adds', function (Blueprint $table) {

            $table->foreign('addtype_id')->references('id')->on('add_types');
        });

        Schema::table('adds', function (Blueprint $table) {

            $table->foreign('promoter_id')->references('id')->on('promoters');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adds');
    }
}
