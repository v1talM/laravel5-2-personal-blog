<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/27 0027
 * Time: 上午 11:08
 */

namespace App\Vital\Services;


use App\Vital\Repositories\HomeRepository;
use Carbon\Carbon;

class HomeService
{
    public $repository;
    public $carbon;
    /**
     * HomeService constructor.
     * @param $repository
     */
    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
        $this->carbon = new Carbon;
    }

    public function getHotArtilces()
    {
        $hot = $this->repository->getHotArticles();
        return $hot;
    }

    public function getVisits()
    {
        $totals = $this->repository->getAllVisits();
        return (implode("," , array_column($totals , 'visit_count')));
    }

    public function getAllCategories()
    {
        $categories = $this->repository->getAllCategoriesCount();
        return $categories;
    }

    public function addVisitCount()
    {
        $total = $this->repository->total
            ->where('month','=',$this->carbon->month)
            ->firstOrCreate(['month'=>$this->carbon->month, 'year'=>$this->carbon->year]);
        $total->increment('visit_count');
    }

    public function getArticlesVisitTotal($articles)
    {
        $total = 0;
        foreach ($articles as $article)
        {
            $total += $article->read_count;
        }
        return $total;
    }
}