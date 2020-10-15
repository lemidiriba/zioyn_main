<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistryOfEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministry_of_education', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('schoolname', 100)->nullable()->default('test School');
            $table->string('schooladdress', 100)->nullable()->default('test Sebeta');
            $table->string('schoolregion', 100)->nullable()->default('test rigion');
            $table->string('schoolphone', 100)->nullable()->default('0911113099');
            $table->string('schoolidentificationid', 100)->nullable()->default('identification non');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ministry_of_education');
    }
}