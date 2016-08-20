<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $articles = Article::where('category_id','=',$category->id)
            ->orderBy('published_at','desc')
            ->with('tags')
            ->paginate(config('blog.globals.posts_per_page'));
        $heading = $category->name;
        return view('blog.category.show',compact('articles','heading'));
    }
}
