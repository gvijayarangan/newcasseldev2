<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplyorders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sup_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->bigInteger('supord_units')->unsigned();
            $table->float('supord_total', 8, 2)->unsigned();
        });

        Schema::table('supplyorders', function (Blueprint $table) {
            $table->foreign('sup_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supplyorders');
    }
}
