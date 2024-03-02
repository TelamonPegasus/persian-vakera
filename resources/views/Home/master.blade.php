<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png"/>
    <title>باشگاه مشتریان</title>
</head>
<body class="lh-lg bg">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            @include('Home.layouts.header')
            @yield('content')
            @include('Home.layouts.footer')
        </div>
    </div>
</div>
@stack('script')
@include('sweetalert::alert')
</body>
</html>