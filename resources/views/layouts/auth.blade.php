<!DOCTYPE html>
<html>
    <head>
        <base href="{{ $baseurl or url('/') }}">
        <meta charset="UTF-8">
        <title>@section('page-title') Adminutes | A Laravel AdminLTE Template Wrapper @show</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        @section('header-styles')
            <link href="/vendor/inoplate-adminutes/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/css/adminutes.css" type="text/css" rel="stylesheet" />
            <link href="/vendor/inoplate-adminutes/vendor/iCheck/square/blue.css" type="text/css" rel="stylesheet" />
        
            @stack('header-styles-stack')
        @show
    </head>
    <body class="{{ $pageType or 'login' }}-page">

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

        <div class="{{ $boxType or 'login' }}-box">
            <div class="{{ $logoType or 'login' }}-logo">
                <a href="{{ $baseurl or url('/') }}">@section('site-title') Adminutes @show</a>
            </div>
            @yield('content')
        </div>
        @section('footer-scripts')
            <script src="/vendor/inoplate-adminutes/vendor/pace/pace.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/fastclick/fastclick.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/select2/select2.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/iCheck/icheck.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/moment/min/moment-with-locales.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/moment-timezone/moment-timezone-with-data.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/vendor/remarkable-bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/js/adminlte.min.js" type="text/javascript"></script>
            <script src="/vendor/inoplate-adminutes/js/adminutes.js" type="text/javascript"></script>
            @stack('footer-scripts-stack')
        @show
    </body>
</html>