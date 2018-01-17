<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('state_id');
            $table->integer('area_id');
            $table->decimal('price', 20, 2);
            $table->string('capacity', 100);
            $table->softDeletes();
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
        Schema::dropIfExists('others_activities');
    }
}
