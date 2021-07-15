<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('doctor_id')->unsigned()->nullable()->index();
            $table->integer('patient_id')->unsigned()->nullable()->index();
            $table->string('phone')->nullable();
            $table->date('appointment_date')->nullable();
            $table->string('charge')->nullable();
            $table->string('note', 1000)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
    }
}
