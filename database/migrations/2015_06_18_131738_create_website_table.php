<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function(Blueprint $table)
        {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('counter');
            $table->unsignedInteger('dep');
            $table->string('title');
            $table->longText('descr');
            $table->timestamps();
        });
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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('counter');
            $table->unsignedInteger('publi');
            $table->unsignedInteger('dep');
            $table->string('refre');
            $table->string('title');
            $table->string('image');
            $table->longText('abst');
            $table->longText('descr');
            $table->timestamps();
        });
        Schema::create('tag_news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag_id')->nullable();
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('news_id')->nullable();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('refre_id')->nullable();
            $table->timestamps();
        });
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
        Schema::create('replay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_up');
            $table->integer('vote_down');
            $table->unsignedInteger('counter');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('comment_id')->nullable();
            $table->foreign('comment_id')->references('id')->on('comment')->onDelete('set null')->onUpdate('cascade');
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
        Schema::drop('users');
        Schema::drop('password_resets');
        Schema::drop('tag');
        Schema::drop('image');
        Schema::drop('news');
        Schema::drop('tag_news');
        Schema::drop('comment');
        Schema::drop('replay');


	}

}
