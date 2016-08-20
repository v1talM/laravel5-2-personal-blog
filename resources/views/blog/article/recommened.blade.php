@inject('articles','App\Repositories\Presenter\ArticlePresenter')
<div class='related-posts white-wrap'>
    <div class='section-heading'>
        <span class='section-heading-line'></span>
        <span class='section-heading-text'> You Might Also Like </span>
    </div>
    <div class='blog-posts-alt blog-posts-alt-diagonal-effect-enabled clearfix'>
        @foreach($articles->getRecommenedPosts(3,$category) as $key => $article)
        <div class='blog-post-alt carousel-item col col-4 {{ $key==2?'col-last':'' }} '>
            <div class='blog-post-alt-thumb'>
                <div class='blog-post-alt-thumb-inner'><img width='800' height='800'
                                                            src='{{ $article->thumbnail }}'
                                                            class='wp-post-image wp-post-image'
                                                            alt='{{ $article->title }}'
                                                            sizes='(max-width: 800px) 100vw, 800px'></div>
                <div class='blog-post-alt-thumb-cover'></div>
            </div>
            <div class='blog-post-alt-main'>
                <div class='blog-post-alt-main-inner'>
                    <div class='blog-post-alt-date'> {{ $article->published_at->diffForHumans() }}</div>
                    <div class='blog-post-alt-title'><h2><a data-pjax
                                    href='{{ route('article.show', ['slug' => $article->slug]) }}'
                                    target='_self'> {{ $article->title }} </a></h2></div>
                    <div class='blog-post-alt-cat'><a data-pjax href='{{ route('category.show', ['slug' => $article->category->slug]) }}'
                                                      rel='category tag'>{{ $article->category->name }}</a>
                    </div>
                    <div class='blog-post-alt-read-more'><a data-pjax
                                href='{{ route('article.show', ['slug' => $article->slug]) }}'
                                target='_self'> Read More <span class='dslc-icon dslc-icon-long-arrow-right'><i
                                        class='fa fa-angle-right'></i></span> </a></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
