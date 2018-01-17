<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantOtherActivityDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_other_activity_declarations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ic_number');
            $table->datetime('application_date');
            $table->integer('applicant_other_activity_id');
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
        Schema::dropIfExists('applicant_other_activity_declarations');
    }
}
