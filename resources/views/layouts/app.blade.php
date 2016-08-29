<html lang="zh-CN"  style="transform: none;"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Laravel,php,vue.js,Laravel框架博客">
    <meta name="description" content="{{ config('blog.globals.description') }}">
    @yield('description')
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>
        @yield('title')  - {{ config('blog.globals.title') }} @show
    </title>

    <link rel="alternate" type="application/rss+xml" href="{{ route('rss') }}"
          title="RSS Feed {{ config('blog.globals.title') }}">
    <link rel="stylesheet" id="gglcptch-css"
          href="{{ asset('frontend/css/gglcptch.css') }}" type="text/css"
          media="all">
    <link rel="stylesheet" id="contact-form-7-css"
          href="{{ asset('frontend/css/styles.css') }}" type="text/css"
          media="all">
    <link rel="stylesheet" id="fontawesome-css"
          href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css"
          media="all">
    <link rel="stylesheet" id="slicknav-css"
          href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" media="all">
    <link href="{{ asset('frontend/css/monokai_sublime.min.css') }}" rel="stylesheet">
    @yield('ex_css')
    <link rel="stylesheet" id="main-css" href="{{ asset('frontend/css/style.css') }}"
          type="text/css" media="all">
    <link rel="stylesheet" id="ot-dynamic-dynamic_css-css"
          href="{{ asset('frontend/css/dynamic.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend/css/nprogress.css') }}">
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('frontend/js/nprogress.js') }}"></script>
</head>
<body class="sticky-sidebar" style="transform: none;" id="body">
@include('layouts/blog/header')
@yield('feature')
<div id="pjax-container">
    <div id="main" style="transform: none;">
        <div class="wrapper clearfix" style="transform: none;">
            @yield('content')
        </div>
    </div>

</div>
@include('layouts/blog/footer')
@yield('ex_script')
<script type="text/javascript"
        src="{{ asset('frontend/js/jquery-migrate.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('frontend/js/jquery.form.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/smoothscroll.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('frontend/js/theia-sticky-sidebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/retina.min.js') }}"></script>
<script src="{{ asset('frontend/js/highlight.min.js') }}"></script>
<script>
    $(document).ready(function(){
        hljs.initHighlightingOnLoad();
        $(document).pjax('a', '#pjax-container');
        $(document).on("pjax:start",function(){NProgress.start()});
        $(document).on("pjax:end",function(){NProgress.done()});
        $(document).on("pjax:timeout", function(event) {
            // 阻止超时导致链接跳转事件发生
            event.preventDefault()
        });
    });

</script>

@yield('code_js')
</body>
</html>