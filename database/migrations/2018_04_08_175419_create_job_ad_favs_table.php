<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_ad_favs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_ad_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('job_ad_id')->references('id')->on('job_ads');
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
        Schema::dropIfExists('job_ad_favs');
    }
}
