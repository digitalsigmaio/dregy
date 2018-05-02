<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('salary');
            $table->string('ref_id');
            $table->unsignedInteger('job_ad_category_id');
            $table->unsignedInteger('job_experience_level_id');
            $table->unsignedInteger('job_employment_type_id');
            $table->unsignedInteger('job_type_id');
            $table->unsignedInteger('job_education_level_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->string('address')->nullable();
            $table->string('img')->nullable();
            $table->boolean('approved')->nullable();
            $table->unsignedInteger('admin_id')->nullable();
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('job_ad_category_id')->references('id')->on('job_ad_categories');
            $table->foreign('job_experience_level_id')->references('id')->on('job_experience_levels');
            $table->foreign('job_employment_type_id')->references('id')->on('job_employment_types');
            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->foreign('job_education_level_id')->references('id')->on('job_education_levels');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_ads');
    }
}
