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
            $table->timestamp('order_date_created')->date()->default('0000-00-00 00:00:00');
            $table->string('order_priority')->nullable();
            $table->string('order_status');
            $table->decimal('order_total_cost', 8,2)->default(0.00);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');;
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->default('0000-00-00 00:00:00');;
            $table->integer('updated_by')->nullable();
            $table->string('resident_comment')->nullable();
            $table->integer('issue_type');
            $table->string('requestor_name')->nullable();
         //   $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            /*$table->primary(['order_id']);*/
        });

        //then set autoincrement to 1000
        DB::update("ALTER TABLE orders AUTO_INCREMENT = 100;");
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