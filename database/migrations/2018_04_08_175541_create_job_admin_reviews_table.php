<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdminReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_admin_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_ad_id');
            $table->unsignedInteger('admin_id');
            $table->boolean('approved');
            $table->timestamps();

            $table->foreign('job_ad_id')->references('id')->on('job_ads');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_admin_reviews');
    }
}
