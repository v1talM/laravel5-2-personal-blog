@inject('comments','App\Repositories\Presenter\ArticlePresenter')
<div id="recent-comments" class="widget widget_recent_comments">
    <h3 class="widget-title">
        <span class="widget-title-line"></span>
        <span class="widget-title-text">{{ config('blog.globals.recent_comments') }}</span>
    </h3>
    <ul id="recentcomments">
        <li class="recentcomments"><span class="comment-author-link">Nana</span> on <a
                    href="http://mypreview.net/maria/autumn-leaves/#comment-6">Autumn leaves</a></li>
        <li class="recentcomments"><span class="comment-author-link">Mother Teresa</span> on <a
                    href="http://mypreview.net/maria/houses-oriental-bay/#comment-4">Houses above Oriental Bay</a></li>
        <li class="recentcomments"><span class="comment-author-link">P. J. O'Rourke</span> on <a
                    href="http://mypreview.net/maria/cup-coffee-spring-tulips/#comment-3">Cup of Coffee and Spring
                Tulips</a>
        </li>
    </ul>
</div>