@inject('recArticles','App\Repositories\Presenter\ArticlePresenter')
<div class="featured-blog-posts hidden-xs">
    <div class="featured-blog-posts-inner">
        <div class="blog-posts-alt blog-posts-alt-diagonal-effect-enabled no-col-spacing carousel-container">
            <div class="carousel" data-stop-on-hover="false" data-columns="4" data-pagination="false" data-slide-speed="200" data-pagination-speed="800" data-scroll-per-page="false">
                @foreach($recArticles->getRecommenedArticles() as $recArticle)
                    <div class="blog-post-alt carousel-item">
                        <div class="blog-post-alt-thumb">
                            <div class="blog-post-alt-thumb-inner">
                                <img width="800" height="800"
                                     src="{{ $recArticle->thumbnail }}"
                                     class="wp-post-image wp-post-image"
                                     alt="{{ $recArticle->title }}"
                                     sizes="(max-width: 800px) 100vw, 800px">
                            </div><!-- End .blog-post-alt-thumb-inner -->
                            <div class="blog-post-alt-thumb-cover"></div>
                        </div><!-- End .blog-post-alt-thumb -->
                        <div class="blog-post-alt-main">
                            <div class="blog-post-alt-main-inner">
                                <div class="blog-post-alt-date">
                                    {{ $recArticle->published_at->diffForHumans() }}
                                </div><!-- End .blog-post-alt-date -->
                                <div class="blog-post-alt-title">
                                    <h2>
                                        <a
                                                href="{{ route('article.show', ['slug' => $recArticle->slug]) }}"
                                                target="_self"> {{ $recArticle->title }} </a>
                                    </h2>
                                </div><!-- End .blog-post-alt-title -->
                                <div class="blog-post-alt-cat"><a
                                            href="{{ route('category.show', ['slug' => $recArticle->category->slug]) }}"
                                            rel="category tag">{{ $recArticle->category->name }}</a></div>
                                <div class="blog-post-alt-read-more"><a
                                            href="{{ route('article.show', ['slug' => $recArticle->slug]) }}"
                                            target="_self"> Read More <span
                                                class="dslc-icon dslc-icon-long-arrow-right"><i
                                                    class="fa fa-angle-right"></i></span> </a></div>
                            </div><!-- End .blog-post-alt-main-inner -->
                        </div><!-- End .blog-post-alt-main -->
                    </div><!-- End .blog-post-alt -->
                @endforeach
            </div><!-- End .carousel -->
                <a href="#_" class="carousel-go-prev"></a>
            <a href="#_" class="carousel-go-next"></a>
        </div><!-- End .blog-posts-alt -->
    </div><!-- End #featured-blog-posts-inner -->
</div><!-- End #featured-blog-posts -->
