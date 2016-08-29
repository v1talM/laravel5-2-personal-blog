<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/27 0027
 * Time: 下午 3:55
 */

namespace App\Vital\Factories;


use App\Models\Article;
use App\Models\Category;
use App\Models\Total;

class HomeFactory
{
    public $article;
    public $total;
    public $category;

    /**
     * HomeFactory constructor.
     * @param $article
     * @param $total
     * @param $category
     */
    public function __construct(Article $article, Total $total, Category $category)
    {
        $this->article = $article;
        $this->total = $total;
        $this->category = $category;
    }

}