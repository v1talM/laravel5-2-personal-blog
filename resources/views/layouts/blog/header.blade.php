@inject('categories','App\Repositories\Presenter\ArticlePresenter')
<header id="header">
    <div id="header-top">
        <div class="wrapper clearfix navbar-custom">
            <nav id="navigation" class="hidden-xs">
                <ul id="hornavmenu" class="menu">
                    <li id="menu-item-73"
                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-73">
                        <a href="{{ route('home') }}">Home</a></li>
                    @foreach($categories->getCategory() as $category)
                    <li id="menu-item-{{ $category->id }}"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-{{ $category->id }} "><a
                                href="{{ route('category.show',['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </nav><!-- End #navigation -->
            <div class="menu-mobile">
            </div>
            <div class="pull-right top-social-search">
                <div id="header-search">
                    <div class="header-search-inner">
                        <form method="get" id="searchform" action="{{ route('search') }}"><input type="text"
                                                                                                       name="query"
                                                                                                       required="required"
                                                                                                 title="{{ config('blog.globals.search_for') }}"
                                                                                                 placeholder="{{ config('blog.globals.search_placeholder') }}">
                        </form>
                        <span class="header-search-icon"> <span class="fa fa-search"></span> </span></div>
                </div>
                <div id="header-social"><a target="_self" href="http://hire.v1tal.xyz"><span
                                class="fa fa-qq"></span></a>
                    <a target="_self" href="http://hire.v1tal.xyz"><span
                                class="fa fa-weixin"></span></a>
                    <a target="_self" href="http://hire.v1tal.xyz"><span
                                class="fa fa-weibo"></span></a>
                    <a target="_self" href="http://hire.v1tal.xyz"><span
                                class="fa fa-soundcloud"></span></a></div>
            </div>
        </div><!-- End .wrapper -->
    </div><!-- End #header-top -->
    <div id="header-main">
        <div class="wrapper"><a href="{{ route('home') }}" target="_self"> <img
                        src="{{ asset('images/theme-logo.png') }}"
                        alt="" class="logo-image"> </a></div>
    </div><!-- End #header-main -->
</header><!-- End .wrapper -->
