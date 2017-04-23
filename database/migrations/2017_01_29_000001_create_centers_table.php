<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cntr_name');
            $table->string('cntr_add1');
            $table->string('cntr_add2')->nullable();
            $table->string('cntr_city');
            $table->string('cntr_state');
            $table->string('cntr_zip');
            $table->string('cntr_phone')->nullable();
            $table->string('cntr_fax')->nullable();
            $table->String('cntr_comments')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('centers');
    }
}
