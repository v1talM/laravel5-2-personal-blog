@extends('layouts.app')

@section('title')
    {{ $article->title }}
    @parent
@endsection

@section('content')
    <div id="content" class="col col-8">
        <div id="white-wrap">
            @include('blog.article.article_wrapper')
            @include('blog.article.recommened',['category'=>$article->category->id])
            @include('blog.article.leave_comment')
        </div>
    </div>
    <aside id="sidebar" class="col col-4 col-last"
           style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
            @include('layouts.blog.widget.recent_posts')
            @include('layouts.blog.widget.search')
            @include('layouts.blog.widget.github')
            @include('layouts.blog.widget.calendar')
            @include('layouts.blog.widget.tags')
        </div>
    </aside>
@endsection
@section('ex_script')
    <script type="text/javascript" src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/mytheme.js') }}"></script>
@endsection