<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('test_name')->nullable();
            $table->integer('patient_id')->unsigned()->nullable()->index();
            $table->integer('doctor_id')->unsigned()->nullable()->index();
            $table->integer('bill_id')->unsigned()->nullable()->index();
            $table->date('test_date')->nullable();
            $table->string('test_result')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tests');
    }
}