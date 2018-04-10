<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ad_favs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_ad_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('product_ad_id')->references('id')->on('product_ads');
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
        Schema::dropIfExists('product_ad_favs');
    }
}
