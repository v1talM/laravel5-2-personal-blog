<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{

    public function show($slug)
    {
        $tag = Tag::whereSlug($slug)->firstOrFail();
        $articles = $tag->articles()->paginate(config('blog.globals.posts_per_page'));
        $heading = config('blog.globals.posts_for').$tag->name;
        return view('blog.tag.show',compact('heading','articles'));
    }

}
