<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantOtherActivityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_other_activity_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_other_activity_id');
            $table->string('name', 200);
            $table->string('agency', 200);
            $table->string('phone', 30);
            $table->string('email', 200);
            $table->string('fax', 30);
            $table->text('address');
            $table->string('postcode');
            $table->string('bandar');
            $table->integer('state_id');
            $table->integer('country_id');
            $table->datetime('starting_date');
            $table->datetime('ending_date');
            $table->text('description');
            $table->string('participant_file');
            $table->string('program_file');
            $table->string('participant', 50);
            $table->string('day', 50);
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
        Schema::dropIfExists('applicant_other_activity_details');
    }
}
