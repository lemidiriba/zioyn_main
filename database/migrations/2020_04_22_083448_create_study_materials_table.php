<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('studymaterialfilename', 250)->nullable()->default('test material');
            $table->unsignedBigInteger('subjectid');
            $table->unsignedBigInteger('schoolid');
            $table->unsignedBigInteger('adminid');

            $table->longText('description')->nullable()->default('sample subject discription');

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
        Schema::dropIfExists('study_materials');
    }
}