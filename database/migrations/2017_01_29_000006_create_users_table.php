<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('m_name')->nullable();
            $table->string('l_name');
           // $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('comment')->nullable();
            $table->string('cell')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('rec_email')->default(true);
            $table->integer('res_con_id')->unsigned()->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('res_con_id')->references('id')->on('rescontacts')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
