@extends('layouts.admin.admin')

@section('title')
    创建文章 @parent
@endsection

@section('ex_css')
    <link rel="stylesheet" href="{{ asset('backend/vendors/editor/css/build.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/dropzone/dist/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/dropzone/dist/dropzone.css') }}">
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <style>
        .CodeMirror.form-control{
            height:100%;
        }
    </style>
@endsection
@section('css')

@endsection
@section('content')
    @inject('menus','App\Repositories\Presenter\ArticlePresenter')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>创建文章</h3>
            </div>
        </div>
        @if (count($errors) > 0)
        <div class="x_panel">
            <div class="x_content">

                    <div class="alert alert-danger alert-dismissible fade in">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

            </div>
        </div>
        @endif
        <div class="clearfix"></div>
        <div class="row">
            <form action="{{ route('admin.article.store') }}" class="form-horizontal form-label-left input_mask" id="article_form" accept-charset="UTF-8" method="post">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    {{ csrf_field() }}
                    <input type="text" value="{{ old('title') }}" class="form-control has-feedback-left" name="title" id="inputSuccess2" placeholder="{{ config('admin.globals.editor.title') }}">
                    <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>
                </div>
                <input type="hidden" value="{{ old('thumbnail') }}" name="thumbnail">
                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                    <select class="select2_category form-control" tabindex="-1" name="category_id">
                        @foreach($menus->getCategory() as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
                    <select class="select2_tag form-control" multiple="multiple" tabindex="-1" name="tags[]">
                        @foreach($menus->getAllTags() as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <div class="row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6 ">
                            是否推荐
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-6 form-group">
                            <select class="form-control" name="is_recommened">
                                <option value="no">否</option>
                                <option value="yes">是</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <div class="row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6 ">
                            是否置顶
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-6 form-group">
                            <select class="form-control" name="order">
                                <option value="0">否</option>
                                <option value="1">是</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <div class="row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6 ">
                            发布时间
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-6 form-group">
                            <input type="date" value="{{ old('published_at') }}" name="published_at" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <div class="editor">
                        <textarea id="myEditor" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
            </form>
            <form action="/file-upload" class="form-horizontal dropzone" id="my-awesome-dropzone">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <input name="file" class="hidden" type="file" />
                </div>

            </form>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                    <button type="button" id="create" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/editor/js/build.js') }}"></script>
    <script src="{{ asset('backend/vendors/dropzone/dist/dropzone.js') }}"></script>
    <script>
        $(".select2_category").select2({
            placeholder: "所属分类, 如: 前端",
            allowClear: true
        });
        $(".select2_tag").select2({
            placeholder: "标签, 如: Laravel,PHP",
            allowClear: true
        })
        $("#my-awesome-dropzone").dropzone({
            url: "/admin/file/post" ,
            fallback:"你的浏览器不支持图片上传插件",
            headers: { "X-CSRF-TOKEN": $("[name='_token']").attr('content')},
            success: function (response) {
                var res = $.parseJSON(response.xhr.response);
                $("[name='thumbnail']").val(res.thumbnail);
            }
        });
        $("#my-awesome-dropzone").on('complete',function (response) {
            console.log('ok')
        })
        $("#create").on('click', function () {
            $("#article_form").submit();
        })
    </script>
@endsection