<!DOCTYPE html>
<html lang="{{ $user['locale'] or config('app.locale') }}">
    <head>
        <base href="{{ $baseurl or url('/') }}">
        <title>@section('page-title') Adminutes | A Laravel AdminLTE Template Wrapper @show</title>
        @section('header-meta')
            <meta charset="UTF-8">
            <!-- Tell the browser to be responsive to screen width -->
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <meta name="app-timezone" content="{{ config('app.timezone') }}" >
            <meta name="user-timezone" content="{{ $user['timezone'] or config('app.timezone') }}" >
            <meta name="csrf-token" content="{{ csrf_token() }}" >
        @show
        @section('header-styles')
            <link href="/vendor/inoplate-adminutes/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/Ionicons/css/ionicons.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/iCheck/square/blue.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/select2/select2.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/ladda/ladda.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/css/adminutes.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/css/skins/_all-skins.css" type="text/css" rel="stylesheet" />
        @show
    </head>
    <body class="hold-transition {{ config('inoplate.adminutes.skin', 'skin-blue') }} sidebar-mini">
        @if(session('error'))
            @include('inoplate-adminutes::partials.flash-message', ['type' => 'error', 'message' => session('error')])
        @endif

        @if(session('warning'))
            @include('inoplate-adminutes::partials.flash-message', ['type' => 'warning', 'message' => session('warning')])
        @endif

        @if(session('success'))
            @include('inoplate-adminutes::partials.flash-message', ['type' => 'success', 'message' => session('success')])
        @endif

        @if(session('info'))
            @include('inoplate-adminutes::partials.flash-message', ['type' => 'info', 'message' => session('info')])
        @endif
        <div class="wrapper">
            @section('navbar')
                @include('inoplate-adminutes::partials.navbar')
            @show
            @section('sidebar')
                @include('inoplate-adminutes::partials.sidebar')
            @show
            <div class="content-wrapper">
                @yield('content')
            </div>
            @section('footer')
                @include('inoplate-adminutes::partials.footer')
            @show
            @section('control-sidebar')
                @include('inoplate-adminutes::partials.control-sidebar')
            @show
        </div>

        @section('footer-scripts')
            <script src="/vendor/inoplate-adminutes/vendor/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/fastclick/fastclick.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/select2/select2.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/iCheck/icheck.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/moment/min/moment-with-locales.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/moment-timezone/moment-timezone-with-data.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/remarkable-bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/ladda/spin.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/ladda/ladda.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/ladda/ladda.jquery.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/js/adminlte.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/js/adminutes.js" type="text/javascript"></script>
        @show
    </body>
</html>