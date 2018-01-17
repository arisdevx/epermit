<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionalForestriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regional_forestries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('update', 1);
            $table->string('delete', 1);
            $table->integer('state_id');
            $table->integer('area_id');
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
        Schema::dropIfExists('regional_forestries');
    }
}
