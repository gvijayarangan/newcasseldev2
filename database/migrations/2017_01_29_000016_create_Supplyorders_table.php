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
        Schema::create('Supplyorders', function (Blueprint $table) {

            $table->integer('sup_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->bigInteger('supord_units')->unsigned();
            $table->bigInteger('supord_total')->unsigned();
        });

        Schema::table('Supplyorders', function (Blueprint $table) {
            $table->foreign('sup_id')->references('id')->on('Supplies')->onDelete('cascade');
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
        Schema::drop('Supplyorders');
    }
}
