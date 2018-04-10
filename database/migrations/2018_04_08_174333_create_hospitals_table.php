<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('ar_slug');
            $table->string('en_slug');
            $table->json('specialities');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->string('ar_address');
            $table->string('en_address');
            $table->text('ar_note')->nullable();
            $table->text('en_note')->nullable();
            $table->string('ar_work_times');
            $table->string('en_work_times');
            $table->json('phones');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('img')->nullable();
            $table->boolean('premium')->default(false);
            $table->timestamps();
            $table->timestamp('expires_at');
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('hospitals');
    }
}
