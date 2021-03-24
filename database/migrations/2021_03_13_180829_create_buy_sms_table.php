<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuySmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_sms', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('amount_of_sms')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_granted')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buy_sms');
    }
}
