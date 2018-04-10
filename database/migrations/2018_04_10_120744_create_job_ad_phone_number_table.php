<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdPhoneNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_ad_phone_number', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_ad_id');
            $table->unsignedInteger('phone_number_id');
            $table->timestamps();

            $table->foreign('job_ad_id')->references('id')->on('job_ads');
            $table->foreign('phone_number_id')->references('id')->on('phone_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_ad_phone_number');
    }
}
