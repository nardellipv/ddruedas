<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin | Dedosruedas.com.ar</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('styleAdmin/assets/css/app.min.css') }}">
    @yield('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('styleAdmin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styleAdmin/assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('styleAdmin/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('styleWeb/assets/fav/android-icon-192x192.png') }}' />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('admin.parts._navbar')
        @include('admin.parts._menu')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="templateshub.net">dedosruedas</a></a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('styleAdmin/assets/js/app.min.js') }}"></script>
@yield('js')
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ asset('styleAdmin/assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('styleAdmin/assets/js/custom.js') }}"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>