<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @todo medical centers structure
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_slug');
            $table->string('en_slug');
            $table->unsignedInteger('degree_id');
            $table->unsignedInteger('speciality_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->string('ar_address');
            $table->string('en_address');
            $table->text('ar_note')->nullable();
            $table->text('en_note')->nullable();
            $table->string('ar_work_times');
            $table->string('en_work_times');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('img')->nullable();
            $table->boolean('premium')->default(false);
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->foreign('speciality_id')->references('id')->on('specialities');
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
        Schema::dropIfExists('clinics');
    }
}