@inject('category','App\Repositories\Presenter\ArticlePresenter')
<div class="widget widget_categories">
    <h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">Categories</span></h3>
    <ul>
        @foreach($category->getCategory() as $val)
            <li class="cat-item cat-item-{{ $val->id }}"><a
                        href="{{ route('category.show',['slug' => $val->slug]) }}"> {{ $val->name }}
                </a> <span
                        class="cat-count"> {{ $val->articles->count() }} </span></li>
        @endforeach
    </ul>
</div>
