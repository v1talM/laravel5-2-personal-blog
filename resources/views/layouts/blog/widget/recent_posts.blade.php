@inject('articles','App\Repositories\Presenter\ArticlePresenter')
<div class="widget widget-popular-posts">
    <h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">{{ config('blog.globals.recent_posts') }}</span>
    </h3>
    <div class="recent-posts-widget">
        @foreach($articles->getRecentPosts() as $article)
            <div class="recent-posts-widget-post">
                <div class="recent-posts-widget-thumb">
                    <a href="{{ route('article.show', ['slug' => $article->slug]) }}"
                                                          target="_self">
                        <img width="300" height="300"
                             src="{{ $article->thumbnail }}"
                           class="img-responsive wp-post-image"
                           alt="{{ $article->title }}"
                           sizes="(max-width: 300px) 100vw, 300px">
                    </a></div>
                <div class="recent-posts-widget-main">
                    <div class="recent-posts-widget-date"> {{ $article->published_at->diffForHumans() }}</div>
                    <div class="recent-posts-widget-title">
                        <a href="{{ route('article.show', ['slug' => $article->slug]) }}"
                                                              target="_self"> {{ $article->title }} </a></div>
                    <div class="recent-posts-widget-category">
                        <a href="{{ route('article.show', ['slug' => $article->category->slug]) }}"
                                                                 rel="category tag">{{ $article->category->name }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
