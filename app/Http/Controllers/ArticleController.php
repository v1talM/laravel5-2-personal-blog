<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Vital\Repositories\ArticleRepository;
use App\Vital\Services\ArticleService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    private $articleRepository;

    /**
     * ArticleController constructor.
     * @param $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = $this->articleRepository->getArticleBySlug($slug);
        return view('blog.article.show',compact('article'));
    }

}
