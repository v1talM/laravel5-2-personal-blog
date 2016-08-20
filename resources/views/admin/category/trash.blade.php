@extends('layouts.admin.admin')

@section('title')
    分类回收站@parent
@endsection
@section('ex_css')
    @include('layouts.css.dataTable')
@endsection
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>分类回收站</h3>
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
                                <th>分类名称</th>
                                <th>分类Slug</th>
                                <th>分类描述</th>
                                <th>删除时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td><input type="checkbox" class="flat" name="table_records"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->deleted_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',['id' => $category->id]) }}"
                                           class="btn btn-success btn-xs"
                                           data-toggle="tooltip" data-original-title="编辑分类" data-placement="top"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.category.delete',['id' => $category->id]) }}"
                                           class="btn btn-danger btn-xs"
                                           data-toggle="tooltip" data-original-title="删除分类" data-placement="top"><i class="fa fa-trash"></i></a>
                                        <a href="{{ route('admin.category.restore',['id' => $category->id]) }}"
                                           class="btn btn-info btn-xs"
                                           data-toggle="tooltip" data-original-title="恢复分类" data-placement="top"><i class="fa fa-recycle"></i></a>

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