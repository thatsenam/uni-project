<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSMSModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_models', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sms_template_id')->unsigned()->nullable()->index();
            $table->integer('sms_contact_id')->unsigned()->nullable()->index();
            $table->boolean('is_all_supplier')->nullable();
            $table->boolean('is_all_customer')->nullable();
            $table->boolean('is_sent')->nullable();
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
        Schema::drop('s_m_s_models');
    }
}
