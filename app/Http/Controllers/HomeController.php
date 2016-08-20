<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Article;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use App\Services\RssFeed;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('published_at', '<=', Carbon::now())
            ->with(['category','tags'])
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.globals.posts_per_page'));
        return view('blog.index.home', compact('articles'));
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:subscribes,email|email',
        ]);
        if($validator->fails()){
            flash('订阅失败!请您检查邮箱格式是否正确或者您之前已经订阅过推送服务了!','error');
            return redirect()->back();
        }
        $subscribe = Subscribe::create(['email' => $request->input('email')]);
        if($subscribe){
            flash('订阅成功!我们将定期为您推送精彩内容!','success');
        }else{
            flash('订阅失败!','error');
        }
        return redirect()->back();
    }

    public function test()
    {
        $flag = Mail::send('email.test',['name'=>'test'],function($message){
            $to = '373357042@qq.com';
            $message ->to($to)->subject('测试邮件');
        });
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();
        return response($rss)
            ->header('Content-type', 'application/rss+xml');
    }
}
