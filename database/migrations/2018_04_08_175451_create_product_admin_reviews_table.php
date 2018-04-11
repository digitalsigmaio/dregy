<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdminReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_admin_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_ad_id');
            $table->unsignedInteger('admin_id');
            $table->boolean('approved');
            $table->timestamps();

            $table->foreign('product_ad_id')->references('id')->on('product_ads');
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
        Schema::dropIfExists('product_admin_reviews');
    }
}
