<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('res_pccid');
            $table->string('res_fname');
            $table->string('res_mname')->nullable();
            $table->string('res_lname');
            $table->string('res_gender');
            $table->string('res_homephone')->nullable();
            $table->string('res_cellphone')->nullable();
            $table->string('res_email')->nullable();
            $table->string('res_comment')->nullable();
            $table->string('res_status');
            $table->integer('res_apt_id')->unsigned();
            $table->integer('res_cntr_id');
            $table->foreign('res_apt_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('residents');
    }
}

