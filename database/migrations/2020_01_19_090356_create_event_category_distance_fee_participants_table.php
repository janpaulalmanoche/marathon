<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategoryDistanceFeeParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_category_distance_fee_participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_category_distance_fees_id');
            $table->integer('category_distances_id');
            $table->integer('fee');
//            $table->integer('event_categories_id');
            $table->integer('event_id');
            $table->string('participant_no')->nullable();
            $table->integer('user_id');
            $table->string('reg_type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('event_category_distance_fee_participants');
    }
}
