<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeDosRuedas | @yield('title', 'Cambiar tu moto de forma fácil') {{ date('Y') }}</title>
    <meta name="description" content="@yield('meta-description','Portal dedicado 100% a la venta de motocicletas en toda Argentina.')">

    <link href="{{ asset('styleWeb/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/iconmoon.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/style.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/cs-automobile-plugin.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/widget.css') }}" rel="stylesheet">
    <link href="{{ asset('styleWeb/assets/css/responsive.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('styleWeb/assets/fav/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('styleWeb/assets/fav/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('styleWeb/assets/fav/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('styleWeb/assets/fav/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('styleWeb/assets/fav/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('styleWeb/assets/fav/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('styleWeb/assets/fav/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('styleWeb/assets/fav/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('styleWeb/assets/fav/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{ asset('styleWeb/assets/fav/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('styleWeb/assets/fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('styleWeb/assets/fav/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('styleWeb/assets/fav/favicon-16x16.png') }}">

    {{-- <meta property="og:url" content="@yield('og:url', 'https://dedosruedas.com.ar')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('og:title', 'Cambia tu moto de forma fácil.')"/>
    <meta property="og:site_name" content="DeDosRuedas"/>
    <meta property="og:description" content="@yield('og:description', 'Portal dedicado 100% a la venta de motocicletas en toda Argentina.')"/>
    <meta property="og:image" content="@yield('og:image', 'https://dedosruedas.com.ar/styleWeb/assets/images/logo.png')"/>
    <meta property="fb:app_id" content="325191962261739"/> --}}

    @yield('css')
    @notifyCss
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('styleWeb/assets/scripts/jquery.js') }}"></script>
    <script src="{{ asset('styleWeb/assets/scripts/modernizr.js') }}"></script>
    <script src="{{ asset('styleWeb/assets/scripts/bootstrap.min.js') }}"></script>

    {!! htmlScriptTagJsApi() !!}
    @include('external.analytics')
    @include('external.adsenses')
</head>
<body class="@yield('body')">
<div class="wrapper">
    <!-- Header Start -->
@include('web.parts._menu')
<!-- Header End -->
{{--toast--}}
@include('notify::messages')

<!-- Main Start -->
    <div class="main-section">
    @if(Route::is('home'))
        <!--Main Banner-->
        @include('web.parts._mainBanner')
        <!--Main Banner-->
            <!--Main Banner form-->
        {{--@include('web.parts._search')--}}
    @endif
    <!--Main Banner form-->
        @yield('content')
    </div>
    <!-- Main End -->
    <!-- Footer Start -->
@include('web.parts._footer')
<!-- Footer End -->
</div>
<script src="{{ asset('styleWeb/assets/scripts/responsive.menu.js') }}"></script>
<script src="{{ asset('styleWeb/assets/scripts/chosen.select.js') }}"></script>
<script src="{{ asset('styleWeb/assets/scripts/slick.js') }}"></script>
<script src="{{ asset('styleWeb/assets/scripts/echo.js') }}"></script>

@notifyJs
@yield('js')
<!-- Put all Functions in functions.js -->
<script src="{{ asset('styleWeb/assets/scripts/functions.js') }}"></script>
</body>

</html>