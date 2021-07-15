<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('bill_no')->nullable();
            $table->integer('room_id')->unsigned()->nullable()->index();
            $table->string('doctor_charge')->nullable();
            $table->string('room_charge')->nullable();
            $table->string('total_charge')->nullable();
            $table->integer('doctor_id')->unsigned()->nullable()->index();
            $table->integer('bill_by')->unsigned()->nullable()->index();
            $table->string('date')->nullable();
            $table->string('notes', 1000)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
