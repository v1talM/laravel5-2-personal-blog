<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26 0026
 * Time: 下午 10:04
 */

namespace App\Vital\Repositories;


use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;

class ArticleRepository
{
    private $article;
    private $category;
    private $tag;
    /**
     * ArticleRepository constructor.
     * @param $article
     */
    public function __construct(Article $article, Category $category, Tag $tag)
    {
        $this->article = $article;
        $this->category = $category;
        $this->tag = $tag;
    }

    public function getAllPublishedArticles()
    {
        $articles = $this->article
            ->where('published_at','<=',Carbon::now())
            ->with(['tags','category'])
            ->orderBy('published_at','desc')
            ->paginate(config('blog.globals.posts_per_page'));
        return $articles;
    }

    public function getArticleByCategoryId($category_id)
    {
        $articles = $this->article
            ->where('category_id','=',$category_id)
            ->where('published_at','<=',Carbon::now())
            ->orderBy('published_at','desc')
            ->with('tags')
            ->paginate(config('blog.globals.posts_per_page'));
        return $articles;
    }
    
    public function getArticleBySlug($slug)
    {
        $article = $this->article
            ->whereSlug($slug)
            ->with(['tags','category'])
            ->firstOrFail();
        $article->increment('read_count');
        return $article;
    }

    public function getCategoryBySlug($slug)
    {
        return $this->category
            ->whereSlug($slug)
            ->firstOrFail();
    }

    public function getTagBySlug($slug)
    {
        return $this->tag
            ->whereSlug($slug)
            ->firstOrFail();
    }
}