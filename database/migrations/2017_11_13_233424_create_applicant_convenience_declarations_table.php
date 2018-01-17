<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantConvenienceDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_convenience_declarations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('ic_number', 200);
            $table->datetime('application_date');
            $table->integer('applicant_convenience_id');
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
        Schema::dropIfExists('applicant_convenience_declarations');
    }
}
