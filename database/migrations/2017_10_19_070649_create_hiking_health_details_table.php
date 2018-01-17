<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingHealthDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_health_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('detail', 200);
            $table->string('status', 1);
            $table->text('notes');
            $table->string('order', 3);
            $table->integer('hiking_health_id');
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
        Schema::dropIfExists('hiking_health_details');
    }
}
