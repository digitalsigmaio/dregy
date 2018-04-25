<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticClinicSpecialityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_clinic_speciality', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cosmetic_clinic_id');
            $table->unsignedInteger('speciality_id');

            $table->foreign('cosmetic_clinic_id')->references('id')->on('cosmetic_clinics');
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
        Schema::dropIfExists('cosmetic_clinic_speciality');
    }
}
