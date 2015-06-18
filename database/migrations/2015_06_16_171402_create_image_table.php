<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_up');
            $table->integer('vote_down');
            $table->unsignedInteger('counter');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('refre_id')->nullable();
            $table->unsignedInteger('dep');
            $table->longText('descr');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('image');
	}

}
