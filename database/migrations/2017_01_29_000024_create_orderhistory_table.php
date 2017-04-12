<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->integer('wo_id');
            $table->string('requestor');
            $table->integer('closed_by_id');
            $table->integer('created_by');
            $table->string('center_name');
            $table->string('apt_num')->nullable();
            $table->string('common_area')->nullable();
            $table->string('status');
            $table->timestamp('created_timestamp')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_histories');
    }

}