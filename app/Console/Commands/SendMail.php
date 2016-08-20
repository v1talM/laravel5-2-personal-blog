<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send recommened articles to subscribe users email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $article = Article::where('published_at','>=',Carbon::now()->subWeek())
            ->orderBy('published_at','desc')
            ->with('category')
            ->first();
        $users = Subscribe::all();
        foreach ($users as  $user){
            Mail::queue('email.recommened', ['user' => $user, 'article' => $article], function ($m) use ($user) {
                $m->from(config('blog.globals.post_address'), config('blog.globals.post_title'));
                $m->to($user->email, config('blog.globals.post_object_name'))->subject(config('blog.globals.post_subject'));
            });
        }

        $time = Carbon::now();
        Log::info('mail has been sent at '.$time);
    }
}
