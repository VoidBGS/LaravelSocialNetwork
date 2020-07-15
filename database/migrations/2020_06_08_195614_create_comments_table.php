<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forum_post_id')->unsigned()->nullable();
            $table->foreign('forum_post_id')->references('id')->on('forum_posts');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('meme_id')->unsigned()->nullable();
            $table->foreign('meme_id')->references('id')->on('memes');
            $table->longText('content');
            $table->string('posted_by', 30);
            $table->dateTime('posted_on', 0);
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
        Schema::dropIfExists('comments');
    }
}
