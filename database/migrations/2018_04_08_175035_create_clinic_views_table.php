<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalCenterViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_views');
    }
}
