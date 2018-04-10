<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeautyCenterViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beauty_center_views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('beauty_center_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('beauty_center_id')->references('id')->on('beauty_centers');
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
        Schema::dropIfExists('beauty_center_views');
    }
}
