@inject('tags','App\Repositories\Presenter\ArticlePresenter')
<div id="tag_cloud-2" class="widget widget_tag_cloud"><h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">{{ config('blog.globals.tags') }}</span></h3>
    <div class="tagcloud">
        @foreach($tags->getAllTags() as $tag)
            <a href="{{ route('tag.show',['slug' => $tag->slug]) }}" class="tag-link-{{ $tag->id }} tag-link-position-{{ $tag->id }}" title="{{ $tag->articles->count() }} topic" style="font-size: 8pt;">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>