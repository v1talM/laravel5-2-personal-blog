<div class="widget widget-search">
    <h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">Search</span></h3>
    <form method="get" action="{{ route('search') }}">
        <div class="search-box"><input type="text" class="search-widget-input" name="query"
                                       required="required" title="{{ config('blog.globals.search_for') }}"
                                       placeholder="{{ config('blog.globals.search_placeholder') }}"></div>
    </form>
</div>
