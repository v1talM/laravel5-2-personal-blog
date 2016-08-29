<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/27 0027
 * Time: 上午 11:08
 */

namespace App\Vital\Repositories;


use App\Models\Article;
use App\Models\Total;
use App\Vital\Factories\HomeFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeRepository
{
    public $article;
    public $total;
    public $category;
    /**
     * HomeRepository constructor.
     * @param $article
     */
    public function __construct(HomeFactory $homeFactory)
    {
        $this->article = $homeFactory->article;
        $this->total = $homeFactory->total;
        $this->category = $homeFactory->category;
    }

    public function getAllArticles()
    {
        $articles = $this->article->all();
        return $articles;
    }

    public function getAllVisits()
    {
        $visits = $this->total->all()->toArray();
        return $visits;
    }

    public function getHotArticles()
    {
        $articles = $this->article
            ->orderBy('read_count','desc')
            ->limit(4)
            ->get();
        return $articles;
    }

    public function getAllCategoriesCount()
    {
        $categories = $this->category->all();
        return $categories;
    }

}