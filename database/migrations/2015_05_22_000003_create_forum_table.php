<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_forum', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('descr');
            $table->timestamps();
        });
        Schema::create('forum_cat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fid');
            $table->string('name');
            $table->longText('descr');
            $table->timestamps();
        });
        Schema::create('forum_topic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');
            $table->string('title');
            $table->longText('descr');
            $table->integer('author');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('forum_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid');
            $table->integer('tid');
            $table->longText('descr');
            $table->integer('author');
            $table->timestamps();
        });
        Schema::create('forum_users', function (Blueprint $table) {
            $table->integer('userid');
            $table->integer('rank')->default(1);
            $table->primary('userid');
        });
        Schema::create('forum_rank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('isadmin')->default(0);
        });

        DB::table('forum_rank')->insert(array(
            array('name' => 'Member', 'isadmin' => 0),
            array('name' => 'Admin', 'isadmin' => 1),
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forum_cat');
        Schema::drop('forum_forum');
        Schema::drop('forum_topic');
        Schema::drop('forum_reply');
        Schema::drop('forum_users');
        Schema::drop('forum_rank');
    }
}