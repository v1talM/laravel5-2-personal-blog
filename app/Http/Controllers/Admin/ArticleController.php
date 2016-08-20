<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $article;

    /**
     * ArticleController constructor.
     * @param $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->orderBy('id','desc')
            ->paginate(10);
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $input = $request->all();
        $input['slug'] = $input['title'];
        $input['origin_content'] = $input['content'];
        $input['excerpt'] = $input['content'];
        $article = $this->article->create($input);
        $article->tags()->attach($input['tags']);
        flash(config('admin.articles.article.created'),'success');
        return redirect()->route('admin.article.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->article->withTrashed()->findOrFail($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.article.edit',compact('article','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        $article = $this->article->withTrashed()->findOrFail($id);
        $article->update($request->all());
        $article->tags()->sync($request->input('tags'));
        flash(config('admin.articles.article.updated'),'success');
        return redirect()->back();
    }

    public function recommened($id)
    {
        $article = $this->article->withTrashed()->findOrFail($id);
        $article->is_recommened = ($article->is_recommened == 'no')?'yes':'no';
        $article->save();
        flash(config('admin.articles.article.recommened'),'success');
        return redirect()->back();
    }

    public function top($id)
    {
        $article = $this->article->withTrashed()->findOrFail($id);
        $article->order = ($article->order === 0)?1:0;
        $article->save();
        flash(config('admin.articles.article.top'),'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->article->findOrFail($id);
        $article->delete();
        flash(config('admin.articles.article.destroy'),'success');
        return redirect()->back();
    }

    public function trash()
    {
        $articles = $this->article->onlyTrashed()->get();
        return view('admin.article.trash',compact('articles'));
    }

    public function restore($id)
    {
        $article = $this->article->onlyTrashed()
            ->where('id','=',$id)
            ->restore();
        if($article){
            flash(config('admin.articles.article.restore_success'),'success');
            return redirect()->route('admin.article.trash');
        }
        flash(config('admin.articles.article.restore_fail'),'error');
        return redirect()->route('admin.article.trash');
    }

    public function delete($id)
    {
        $article = $this->article-onlyTrashed()
            ->where('id','=',$id)
            ->forceDelete();
        if($article){
            flash(config('admin.articles.article.force_delete_success'),'success');
            return redirect()->route('admin.article.trash');
        }
        flash(config('admin.articles.article.force_delete_fail'),'error');
        return redirect()->route('admin.article.trash');
    }
}
