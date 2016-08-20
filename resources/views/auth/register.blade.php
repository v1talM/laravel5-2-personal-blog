@extends('layouts.auth')

@section('content')
    <body class="login">
    <div>
        <div class="login_wrapper">
            <div id="register" class="animate form">
                <section class="login_content">
                    @if(Session::has('errors'))
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                    <form accept-charset="utf-8" action="{{ url('register') }}" method="post">
                        <h1>Create Account</h1>
                        {{ csrf_field() }}
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary submit" href="">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">已有账号 ?
                                <a href="{{ url('login') }}" class="to_register"> 登 录 </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </body>
@endsection
