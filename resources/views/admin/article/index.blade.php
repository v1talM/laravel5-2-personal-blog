@extends('layouts.admin.admin')

@section('title')
    文章列表 @parent
@endsection

@section('ex_css')
    @include('layouts.css.dataTable')
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>文章列表</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">搜索</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plus Table Design</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                <th>文章标题</th>
                                <th>缩略图</th>
                                <th>摘要</th>
                                <th>内容</th>
                                <th>分类</th>
                                <th>阅读数</th>
                                <th>推荐</th>
                                <th>置顶</th>
                                <th>发布时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                <td><input type="checkbox" class="flat" name="table_records"></td>
                                <td>{{ mb_strimwidth($article->title,0,40) }}</td>
                                <td><a href="{{ $article->thumbnail }}"
                                       class="btn btn-info btn-xs"
                                       data-toggle="tooltip" data-original-title="查看缩略图" data-placement="top"><i class="fa fa-eye"></i></a></td>
                                <td>{{ mb_strimwidth($article->excerpt,0,40) }}</td>
                                <td>{{ mb_strcut($article->content,0,50) }}</td>
                                <td><a class="btn btn-info btn-xs"
                                       data-toggle="tooltip" data-original-title="文章分类" data-placement="top">{{ $article->category->name }}</a></td>
                                <td>{{ $article->read_count }}</td>
                                <td>{{ $article->is_recommened=='yes'?'是':'否' }}</td>
                                <td>{{ $article->order=='1'?'是':'否' }}</td>
                                <td>{{ $article->published_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.article.edit',['id' => $article->id]) }}"
                                       class="btn btn-success btn-xs"
                                       data-toggle="tooltip" data-original-title="编辑文章" data-placement="top"><i class="fa fa-edit"></i></a>
                                    @if($article->is_recommened == 'no')
                                    <a href="{{ route('admin.article.recommened',['id' => $article->id]) }}"
                                       class="btn btn-success btn-xs"
                                       data-toggle="tooltip" data-original-title="推荐" data-placement="top"><i class="fa fa-thumbs-o-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.article.recommened',['id' => $article->id]) }}"
                                       class="btn btn-success btn-xs"
                                       data-toggle="tooltip" data-original-title="取消推荐" data-placement="top"><i class="fa fa-thumbs-o-down"></i></a>
                                    @endif
                                    @if($article->order == '0')
                                    <a href="{{ route('admin.article.top',['id' => $article->id]) }}"
                                       class="btn btn-success btn-xs"
                                       data-toggle="tooltip" data-original-title="置顶" data-placement="top"><i class="fa fa-level-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.article.top',['id' => $article->id]) }}"
                                       class="btn btn-success btn-xs"
                                       data-toggle="tooltip" data-original-title="取消置顶" data-placement="top"><i class="fa fa-level-down"></i></a>

                                    @endif
                                    <a href="{{ route('admin.article.destroy',['id' => $article->id]) }}"
                                       class="btn btn-danger btn-xs"
                                       data-toggle="tooltip" data-original-title="删除文章" data-placement="top"><i class="fa fa-trash"></i></a>
                                    <a href="{{ route('article.show',['slug' => $article->slug]) }}"
                                       class="btn btn-info btn-xs"
                                       data-toggle="tooltip" data-original-title="查看文章" data-placement="top"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouts.script.dataTable')
@endsection