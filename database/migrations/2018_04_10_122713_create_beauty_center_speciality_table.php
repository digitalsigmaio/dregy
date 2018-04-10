<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeautyCenterSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beauty_center_speciality', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('beauty_center_id');
            $table->unsignedInteger('speciality_id');
            $table->timestamps();

            $table->foreign('beauty_center_id')->references('id')->on('beauty_centers');
            $table->foreign('speciality_id')->references('id')->on('specialities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beauty_center_speciality');
    }
}
