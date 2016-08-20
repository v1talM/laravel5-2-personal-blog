
<article id='post-{{ $article->id }}' class='blog-post blog-post-single post-{{ $article->id }} post type-post status-publish format-standard has-post-thumbnail hentry category-awesome category-nature tag-design tag-forest'>
        <div class='blog-post-thumb'>
            <img width='800' height='800' src='{{ $article->thumbnail }}' class='wp-post-image wp-post-image' alt='{{ $article->title }}' sizes='(max-width: 800px) 100vw, 800px' />
        </div>
        <div class='blog-post-main clearfix'>
            <div class='blog-post-info'>
                <div class='blog-post-info-inner'>
                    <div class='blog-post-title'>
                        <h1>{{ $article->title }}</h1>
                    </div>
                    <div class='blog-post-meta'> {{ $article->published_at->diffForHumans() }}
                        <a data-pjax href='{{ route('category.show',['slug' => $article->category->slug]) }}' rel='category tag'>{{ $article->category->name }}</a>
                    </div>
                    <div class='blog-post-content'>
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
@section('code_js')


@endsection