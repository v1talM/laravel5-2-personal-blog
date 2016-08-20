@section('ex_css')
    <link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/pnotify/dist/pnotify.brighttheme.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <style>
        .alert-success {
            color: #ffffff;
            background-color: rgba(38,185,154,0.88);
            border-color: rgba(38,185,154,0.88);
        }
        .brighttheme.ui-pnotify-container{
            color: #fff;
        }
        .brighttheme .ui-pnotify-title{
            color: #fff;
            font-style: 1.2em;
        }
        .brighttheme-icon-success{
            color: #fff;
        }
    </style>
@endsection
<div class="widget widget-feedburner">
    <h3 class="widget-title"><span
                class="widget-title-line"></span><span class="widget-title-text">{{ config('blog.globals.newsletter') }}</span></h3>
    <div class="widget-item feedburner-item">
        <div class="sidebar-text"><p>{{ config('blog.globals.newsletter_description') }}</p>
            <form action="{{ route('subscribe') }}" method="post">
                <div class="form-group">
                    {{ csrf_field() }}
                    <input class="feedburner-email" type="email" required="required"
                                               name="email" placeholder="{{ config('blog.globals.newsletter_placeholder') }}">
                    </div>
                <div class="form-group"><input class="feedburner-btn" type="submit" name="submit"
                                               value="Subscribe"></div>
            </form>
        </div>
    </div>
</div>
@section('ex_js')
    @if (session()->has('flash_notification.message'))

        <script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
        <script src="{{ asset('backend/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
        <script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
        <script>
            new PNotify({
                title: '{{ session('flash_notification.level') }}',
                text: '{!! session('flash_notification.message') !!}',
                type: '{{ session('flash_notification.level') }}'
            });
        </script>
    @endif
@endsection
