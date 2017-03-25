<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ca_name');
            $table->String('ca_comments')->nullable();
            $table->integer('cntr_id')->nullable();
        });

      //  Schema::table('comareas', function (Blueprint $table) {
       //     $table->foreign('cntr_id')->references('id')->on('centers')->onDelete('cascade');
       // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comareas');
    }
}
