<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('promoter_name');
            $table->string('promoter _address');
            $table->unsignedBigInteger('promoter_priorities_id');
            $table->string('phone');
            $table->string('promoter_organization_name');
            $table->string('created_by');
            $table->timestamps();
        });

        Schema::table('promoters', function (Blueprint $table) {

            $table->foreign('promoter_priorities_id')->references('id')->on('promoter_priorities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promoters');
    }
}
