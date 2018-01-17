<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiking_biodatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname', 200);
            $table->string('ic_number', 100);
            $table->datetime('birthday');
            $table->string('age', 5);
            $table->string('gender', 1);
            $table->string('nationality', 200);
            $table->string('phone', 20);
            $table->text('address');
            $table->string('state', 255);
            $table->string('postcode', 20);
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
        Schema::dropIfExists('hiking_biodatas');
    }
}
