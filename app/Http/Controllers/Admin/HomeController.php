<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribe;
use App\Vital\Services\HomeService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $homeService;

    /**
     * HomeController constructor.
     * @param $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }


    public function index()
    {
        $articles = $this->homeService->repository->getAllArticles();
        $article_visits = $this->homeService->getArticlesVisitTotal($articles);
        //返回热门文章的浏览数
        $hot_articles = $this->homeService->getHotArtilces();
        //返回前5个月至今的网站浏览数
        $visits = $this->homeService->getVisits();
        //返回各分类下文章所占比例
        $categories = $this->homeService->getAllCategories();
        $this->homeService->addVisitCount();
        return view('admin.home',compact('articles','hot_articles','visits','categories','article_visits'));
    }

    public function file(Request $request)
    {
        $res = $request->file('file');
        $destinationPath = config('admin.globals.upload_path');
        $fileName = $res->getClientOriginalName();
        $res->move($destinationPath,$fileName);
        return response()->json(['thumbnail'=>'/'.$destinationPath.$fileName]);
    }

    public function subscribe()
    {
        $users = Subscribe::all();
        return view('admin.subscribe',compact('users'));
    }
}
