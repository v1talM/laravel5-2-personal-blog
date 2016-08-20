@extends('layouts.admin.admin')

@section('title')
    分类列表@parent
@endsection
@section('ex_css')
    @include('layouts.css.dataTable')
@endsection
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>分类列表</h3>
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
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <button type="button"
                                class="btn btn-success btn-xs"
                                data-toggle="modal"
                                data-target=".bs-example-modal">{{ config('admin.category.category.add') }}</button>
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
                                <th>名称</th>
                                <th>slug</th>
                                <th>描述</th>
                                <th>帖子数</th>
                                <th>创建日期</th>
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
                                    <td>{{ $category->post_count }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',['id' => $category->id]) }}"
                                           class="btn btn-success btn-xs"
                                           data-toggle="tooltip" data-original-title="编辑分类" data-placement="top"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.category.destroy',['id' => $category->id]) }}"
                                           class="btn btn-danger btn-xs"
                                           data-toggle="tooltip" data-original-title="删除分类" data-placement="top"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">{{ config('admin.category.category.add') }}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left"
                          action="{{ route('admin.category.store') }}"
                          method="post"
                          id="category_form"
                          accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.name') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="name" placeholder="{{ config('admin.category.category.name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.slug') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="slug" placeholder="{{ config('admin.category.category.slug') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.description') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" name="description" placeholder="{{ config('admin.category.category.description') }}"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                    <button type="button" id="submit" class="btn btn-primary">保 存</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('layouts.script.dataTable')
@endsection