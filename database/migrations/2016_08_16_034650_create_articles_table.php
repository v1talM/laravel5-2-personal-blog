<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->comment('优化文章seo');
            $table->string('title')->comment('文章标题');
            $table->string('thumbnail')->comment('文章缩略图');
            $table->text('excerpt')->nullable()->comment('文章摘要');
            $table->text('content')->comment('文章内容');
            $table->text('origin_content')->comment('文章原始内容');
            $table->integer('category_id')->unsigned()->default(0)->index()->comment('分类id');
            $table->integer('read_count')->unsigned()->default(0)->comment('阅读数');
            $table->integer('reply_count')->default(0)->index()->comment('评论数');
            $table->enum('is_recommened',['yes','no'])->default('no')->comment('是否推荐');
            $table->integer('order')->default(0)->index();
            $table->dateTime('published_at')->index()->comment('文章发布时间');
            $table->softDeletes();
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
        Schema::drop('articles');
    }
}
