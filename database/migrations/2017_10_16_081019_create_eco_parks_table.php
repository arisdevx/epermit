<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcoParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_parks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->decimal('price', 20, 2);
            $table->integer('area_id');
            $table->integer('state_id');
            $table->string('capacity', 200);
            $table->integer('permanent_forest_id');
            $table->string('type', 3);
            $table->string('active', 1);
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
        Schema::dropIfExists('eco_parks');
    }
}
