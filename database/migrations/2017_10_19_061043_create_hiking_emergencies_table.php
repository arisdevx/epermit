<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_emergencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('phone', 20);
            $table->text('address');
            $table->text('second_address');
            $table->string('state', 200);
            $table->string('postcode', 20);
            $table->integer('applicant_id');
            $table->integer('user_id');
            $table->integer('hiking_participant_id');
            $table->string('relationship', 255)->nullable();
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
        Schema::dropIfExists('hiking_emergencies');
    }
}
