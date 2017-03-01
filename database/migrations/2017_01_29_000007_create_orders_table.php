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
            $table->integer('apt_id')->unsigned();
            $table->integer('ca_id')->unsigned();
            $table->string('order_description');
            $table->string('order_date_created');
            $table->string('order_priority');
            $table->string('order_status');
            $table->bigInteger('order_total_cost');
            $table->timestamps('deleted_at');
            $table->string('resident_comment');
            $table->string('last_status_modified');
            $table->dateTime('last_status_modified_time');
            $table->integer('issue_type');
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
