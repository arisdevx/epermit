<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('code');
            $table->integer('applicant_id');
            $table->integer('user_id');
            $table->integer('hiking_participant_id');
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
        Schema::dropIfExists('hiking_insurances');
    }
}
