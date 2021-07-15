<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('eid')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phone')->nullable();
            $table->string('salary')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('nid')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
