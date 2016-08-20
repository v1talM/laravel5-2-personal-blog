@inject('hotArticles','App\Repositories\Presenter\ArticlePresenter')
<div class="widget widget-popular-posts">
    <h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">{{ config('blog.globals.popular_posts') }}</span>
    </h3>
    <div class="recent-posts-widget">
        @foreach($hotArticles->getHotArticles() as $hotArticle)
            <div class="recent-posts-widget-post">
            <div class="recent-posts-widget-thumb">
                <a href="{{ route('article.show', ['slug' => $hotArticle->slug]) }}" target="_self">
                    <img
                            width="300" height="300"
                            src="{{ $hotArticle->thumbnail }}"
                            class="img-responsive wp-post-image"
                            alt="Maria free personal WordPress theme blog image14"
                            sizes="(max-width: 300px) 100vw, 300px"/>
                </a>
            </div>
            <div class="recent-posts-widget-main">
                <div class="recent-posts-widget-date"> {{ $hotArticle->published_at->diffForHumans() }}</div>
                <div class="recent-posts-widget-title">
                    <a
                            href="{{ route('article.show', ['slug' => $hotArticle->slug]) }}" target="_self">
                        {{ mb_strcut($hotArticle->title,8) }} </a>
                </div>
                <div class="recent-posts-widget-category"><a
                            href="{{ route('category.show',['slug' => $hotArticle->category->slug]) }}" rel="category tag">{{ $hotArticle->category->name }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
