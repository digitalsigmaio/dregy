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
            $table->string('slug');
            $table->text('description');
            $table->boolean('status');
            $table->string('price');
            $table->string('ref_id');
            $table->unsignedInteger('product_ad_category_id');
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
            $table->foreign('product_ad_category_id')->references('id')->on('product_ad_categories');
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
