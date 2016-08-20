@extends('layouts.app')

@section('title')
    {{ $heading }} @parent
@endsection
@section('description')
    <meta name="description" content="{{ $heading }}">
@endsection
@section('feature')
    @include('layouts/blog/feature')
@endsection
@section('content')
    <div id="content" class="col col-8">
        <div class="white-wrap">
            @include('layouts.blog.widget.blog_wrapper')
        </div>
        @include('layouts.blog.pagination')
    </div>
    <aside id="sidebar" class="col col-4 col-last"
           style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
            @include('layouts.blog.widget.about_widget')
            @include('layouts.blog.widget.popular_posts')
            @include('layouts.blog.widget.feedburner')
            @include('layouts.blog.widget.instagram')
            @include('layouts.blog.widget.search')
            @include('layouts.blog.widget.github')
            @include('layouts.blog.widget.category')
        </div>
    </aside>
@endsection