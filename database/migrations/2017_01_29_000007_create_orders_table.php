<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->increments('id');
            $table->integer('resident_id');
            $table->integer('apt_id')->unsigned()->nullable();
            $table->integer('cntr_id');
            $table->integer('ca_id')->unsigned()->nullable();
            $table->string('order_description')->nullable();
            $table->string('order_date_created')->default('2017-03-01');
            $table->string('order_priority')->nullable();
            $table->string('order_status')->nullable();
            $table->float('order_total_cost', 6,2)->default(0.00);
            $table->timestamps('deleted_at');
            $table->string('resident_comment')->nullable();
            $table->string('last_status_modified')->default('2017-03-01');
            $table->dateTime('last_status_modified_time')->default('2017-03-01');
            $table->integer('issue_type');
            $table->string('requestor_name')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            /*$table->primary(['order_id']);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }

}