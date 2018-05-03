<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticClinicSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_clinic_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cosmetic_clinic_id');
            $table->string('ar_name');
            $table->string('en_name');

            $table->foreign('cosmetic_clinic_id')->references('id')->on('cosmetic_clinics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosmetic_clinic_specialities');
    }
}
