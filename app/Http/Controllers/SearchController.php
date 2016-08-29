<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use TomLingham\Searchy\Facades\Searchy;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $heading = config('blog.globals.search_for').$request->input('query');
        $articles =Searchy::articles('title','slug','excerpt','content')
            ->query($request->input('query'))
            ->get('id');
        $id = [];
        foreach ($articles as $article){
            $id[] = $article->id;
        }
        $articles = Article::whereIn('id',$id)
            ->with('category')
            ->orderBy('published_at','desc')
            ->paginate(config('blog.globals.posts_per_page'));
        return view('blog.search.show',compact('articles','heading'));
    }
}
