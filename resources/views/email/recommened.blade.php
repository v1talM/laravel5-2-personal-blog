<p>
    You have received a new recommened article from vital's blog.</p><p>
    Here are the details:
</p>
<ul>
    <li>文章标题: <strong>{{ $article->title }}</strong></li>
    <li>所属分类: <strong>{{ $article->category->name }}</strong></li>
    <li>文章链接: <a href="{{ route('article.show',['slug' => $article->slug]) }}">{{ $article->title }}</a></li>
</ul>
<hr>
<hr>