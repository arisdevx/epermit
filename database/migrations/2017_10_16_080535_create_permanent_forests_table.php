<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentForestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_forests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            // $table->string('location', 255);
            $table->decimal('price', 20, 2);
            $table->integer('area_id');
            $table->integer('state_id');
            // $table->integer('mountain_id');
            $table->string('capacity');
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
        Schema::dropIfExists('permanent_forests');
    }
}
