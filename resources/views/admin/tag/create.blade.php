@extends('layouts.admin.admin')
@section('title')
    创建标签@parent
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{ config('admin.tag.tag.add') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="x_title">
                        <h2>创建标签</h2>
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
                        <form class="form-horizontal form-label-left"
                              action="{{ route('admin.tag.store') }}"
                              method="post"
                              id="tag_form"
                              accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.name') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="{{ config('admin.tag.tag.name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.slug') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text"
                                           class="form-control"
                                           name="slug"
                                           value="{{ old('slug') }}"
                                           placeholder="{{ config('admin.tag.tag.slug') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ config('admin.category.category.description') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea
                                            class="form-control"
                                            name="description"
                                            placeholder="{{ config('admin.tag.tag.description') }}">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('admin.tag.show') }}" class="btn btn-primary"><i class="fa fa-reply"></i> 返回</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> 保 存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
