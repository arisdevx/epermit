<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conveniences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convenience_category_id');
            $table->integer('state_id');
            $table->integer('area_id');
            $table->string('type', 3);
            $table->integer('eco_park_id');
            $table->string('capacity', 100);
            $table->decimal('price', 20, 2);
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
        Schema::dropIfExists('conveniences');
    }
}
