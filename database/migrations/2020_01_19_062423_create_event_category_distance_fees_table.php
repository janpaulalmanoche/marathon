<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategoryDistanceFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_category_distance_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_categories_id');
            $table->integer('event_id')->nullable();
            $table->integer('limit')->nullable();
            $table->integer('category_distances_id');
            $table->time('start_time');
            $table->integer('fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_category_distance_fees');
    }
}
