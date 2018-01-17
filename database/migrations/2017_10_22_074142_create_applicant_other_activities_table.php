<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantOtherActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_other_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->integer('area_id');
            $table->string('type', 3);
            $table->integer('relation_id');
            $table->text('location');
            $table->integer('applicant_id');
            $table->decimal('amount', 20, 2);
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
        Schema::dropIfExists('applicant_other_activities');
    }
}
