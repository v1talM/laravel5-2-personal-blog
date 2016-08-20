@foreach($articles as $article)
    <article id="post-{{ $article->id }}" class="blog-post post-{{ $article->id }} post type-post status-publish format-standard has-post-thumbnail hentry category-awesome category-nature tag-design tag-forest">
        <div class="blog-post-thumb">
            <span class="blog-post-timestamp">
                <i class="fa fa-clock-o"></i>&nbsp; {{ $article->published_at->diffForHumans() }}
            </span>
            <a data-pjax href="{{ route('article.show',['slug' => $article->slug]) }}" target="_self">
                <img width="800" height="800"
                     src="{{ $article->thumbnail }}"
                     class="wp-post-image wp-post-image"
                     alt="{{ $article->title }}"
                     sizes="(max-width: 800px) 100vw, 800px" />
            </a>
        </div>
        <div class="blog-post-entry-container">
            <div class="blog-post-entry-content">
                <div class="blog-post-meta-data">
                    <div class="post-avatar attr-bg"
                         data-background=""
                         style="background-image: url({{ config('blog.globals.author.post_avatar') }});"></div>
                    <div class="avatar-name">
                        <a data-pjax href="#"
                           target="_self"> {{ config('blog.globals.author.name') }}
                        </a>
                    </div>
                    <div class="meta">
                        <p>
                            <small>
                                @if(isset($article->category))
                                    <i class="fa fa-folder-open"></i>
                                <a
                                        href="{{ route('category.show', ['slug' => $article->category->slug]) }}"
                                        rel="category tag">{{ $article->category->name }}</a>

                                @endif
                                    &nbsp;
                                    /&nbsp;
                                 <i
                                        class="fa fa-eye"></i> {{ $article->read_count }} &nbsp;/&nbsp; <i
                                        class="fa fa-comments"></i> {{ $article->reply_count }} Comment
                            </small>
                        </p>
                    </div>
                </div>
                <div class="blog-post-title">
                    <h2>
                        <a data-pjax href="{{ route('article.show',['slug' => $article->slug]) }}"
                                                    target="_self">
                            {{ $article->title }}
                        </a>
                    </h2>
                </div>
                {{ $article->excerpt }}
            </div>
        </div>
        <div class="blog-post-meta clearfix">
            <div class="pull-left blog-post-read-more"><a
                        href="{{ route('article.show',['slug' => $article->slug]) }}" target="_self"> Read
                    More </a></div>
            <div class="pull-right blog-post-share-icons"><a
                        href="#"><i
                            class="fa fa-facebook"></i></a> <a
                        href="#"><i
                            class="fa fa-twitter"></i></a> <a
                        href="#"><i
                            class="fa fa-google-plus"></i></a> <a
                        href="#"><i
                            class="fa fa-pinterest-p"></i></a></div>
            <div class="clear"></div>
        </div>
    </article>
@endforeach

