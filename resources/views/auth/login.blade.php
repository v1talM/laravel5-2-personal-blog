@extends('layouts.auth')

@section('content')
    <body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form accept-charset="utf-8" action="{{ url('login') }}" method="post">
                        <h1>Vital登 录</h1>
                        {{ csrf_field() }}
                        <div>
                            <input type="text" class="form-control {{ $errors->has(config('admin.globals.username'))?'parsley-error':'' }}" name="email" placeholder="请输入登录邮箱" required="" />
                            @if($errors->has(config('backend')))
                                <p class="text-danger text-left"><strong>{{ $errors->first(config('admin.globals.username')) }}</strong></p>
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control {{ $errors->has('password')?'parsley-error':'' }}" name="password" placeholder="请输入密码" required="" />
                            @if($errors->has('password'))
                                <p class="text-danger text-left"><strong>{{ $errors->first('password') }}</strong></p>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control {{ $errors->has('verify')?'parsley-error':'' }}" name="verify" placeholder="请输入验证码" required="" />
                            </div>
                            <div class="col-md-6">
                                <img src="{{ captcha_src() }}" alt="">
                            </div>
                            @if($errors->has('verify'))
                                <p class="text-danger text-left"><strong>{{ $errors->first('verify') }}</strong></p>
                            @endif
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary submit" >Login</button>
                            <a class="reset_pass" href="{{ url('password/reset') }}">忘记密码?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">没有账号?
                                <a href="{{ url('register') }}" class="to_register"> 立即注册 </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Vital Alela!</h1>
                                <p>©2016 All Rights Reserved. Vital Alela!</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </body>
@endsection
