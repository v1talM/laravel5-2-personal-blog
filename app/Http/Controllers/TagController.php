<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Vital\Repositories\ArticleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{
    private $articleRepository;

    /**
     * TagController constructor.
     * @param $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    public function show($slug)
    {
        $tag = $this->articleRepository->getTagBySlug($slug);
        $articles = $tag->articles()->paginate(config('blog.globals.posts_per_page'));
        $heading = config('blog.globals.posts_for').$tag->name;
        return view('blog.tag.show',compact('heading','articles'));
    }

}
