<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hospital_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals');
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
        Schema::dropIfExists('hospital_views');
    }
}
