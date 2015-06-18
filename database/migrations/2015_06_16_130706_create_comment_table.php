<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_up');
            $table->integer('vote_down');
            $table->unsignedInteger('counter');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('news_id')->nullable();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('set null')->onUpdate('cascade');
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
        Schema::drop('comment');
	}

}
