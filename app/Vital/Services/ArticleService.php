<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/26 0026
 * Time: 下午 10:08
 */

namespace App\Vital\Services;


use App\Vital\Repositories\ArticleRepository;

class ArticleService
{
    private $repository;

    /**
     * ArticleService constructor.
     * @param $repository
     */
    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }


}