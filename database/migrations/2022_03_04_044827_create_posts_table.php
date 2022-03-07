<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigInteger('postid', true)->comment('每篇文章唯一的id');
            $table->bigInteger('parentid')->comment('父文章的id');
            $table->bigInteger('poster')->comment('文章的作者');
            $table->text('title')->comment('文章标题');
            $table->longText('content')->comment('文章内容');
            $table->string('posted', 20)->comment('文章发布的日期');
            $table->integer('category')->comment('文章的所属的分类');
            $table->integer('timesofview')->comment('文章查看次数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
