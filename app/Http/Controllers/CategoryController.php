<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Vital\Repositories\ArticleRepository;

class CategoryController extends Controller
{
    private $articleRepository;

    /**
     * CategoryController constructor.
     * @param $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    public function show($slug)
    {
        $category = $this->articleRepository->getCategoryBySlug($slug);
        $articles = $this->articleRepository->getArticleByCategoryId($category->id);
        $heading = $category->name;
        return view('blog.category.show',compact('articles','heading'));
    }
}
