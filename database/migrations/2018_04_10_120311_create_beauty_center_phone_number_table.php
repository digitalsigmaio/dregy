<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeautyCenterPhoneNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beauty_center_phone_number', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('beauty_center_id');
            $table->unsignedInteger('phone_number_id');
            $table->timestamps();

            $table->foreign('beauty_center_id')->references('id')->on('beauty_centers');
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
        Schema::dropIfExists('beauty_center_phone_number');
    }
}
