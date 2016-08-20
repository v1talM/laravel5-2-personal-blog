<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::whereSlug($slug)->with(['tags','category'])->firstOrFail();
        $article->increment('read_count');
        return view('blog.article.show',compact('article'));
    }

}
