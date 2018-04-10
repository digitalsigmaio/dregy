<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pharmacy_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
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
        Schema::dropIfExists('pharmacy_views');
    }
}
