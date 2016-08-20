<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16 0016
 * Time: 下午 12:13
 */

namespace App\Repositories\Presenter;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;

class ArticlePresenter
{
    public function getRecentPosts($limit=3)
    {
        $articles = Article::recent()
            ->orderBy('published_at','desc')
            ->with('category')
            ->limit($limit)
            ->get();
        return $articles;
    }

    public function getRecommenedArticles($limit=10)
    {
        $recArticles = Article::recent()
            ->recommened()
            ->orderBy('published_at','desc')
            ->with(['category','tags'])
            ->take($limit)
            ->get();
        return $recArticles;
    }

    public function getHotArticles($limit = 3)
    {
        $articles = Article::recent()
            ->orderBy('read_count','desc')
            ->orderBy('published_at','desc')
            ->with('category')
            ->limit($limit)
            ->get();
        return $articles;
    }

    public function getCategory()
    {
        $categories = Category::all();
        return $categories;
    }

    public function getRecommenedPosts($limit=3,$category)
    {
        $articles = Article::recent()
            ->recommened()
            ->orderBy('read_count','desc')
            ->orderBy('published_at','desc')
            ->with('category')
            ->limit($limit)
            ->get();
        return $articles;
    }

    public function getAllTags()
    {
        return Tag::all();
    }

    public function getArticleSelectTag($tags,$article)
    {
        $option = '';
        foreach ($tags as $tag) {
            if(in_array($tag->id,array_column($article->tags->toArray(),'id'))){
                $option.='<option value="'.$tag->id.'" selected="selected">'.$tag->name.'</option>';
            }else{
                $option .='<option value="'.$tag->id.'">'.$tag->name.'</option>';
            }
        }
        return $option;
    }
}