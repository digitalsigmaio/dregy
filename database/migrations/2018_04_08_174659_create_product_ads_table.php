<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('status');
            $table->string('price');
            $table->string('ref_id');
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('city_id');
            $table->string('address')->nullable();
            $table->string('img')->nullable();
            $table->boolean('promoted')->default(false);
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
        Schema::dropIfExists('product_ads');
    }
}
