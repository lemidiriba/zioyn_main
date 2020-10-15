<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('schoolname', 250)->nullable()->default('test school');
            $table->string('schooladdress', 250)->nullable()->default('test school');
            $table->string('schoolphone', 250)->nullable()->default('0911113099');
            $table->string('schoolemail', 250)->nullable()->default('test@school.com');
            $table->string('ministryofeducationunniqueid', 250)->nullable()->default('school identification');
            $table->unsignedBigInteger('schooladminid');
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
        Schema::dropIfExists('schools');
    }
}