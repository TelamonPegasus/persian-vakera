<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />           
    @stack('style')
    <title>مدیریت</title>
</head>
<body class="bg-light">
@include('Admin.layouts.sidebar')
<main>
    @include('Admin.layouts.header')
    @yield('content')
</main>
@include('Admin.layouts.footer')
@include('sweetalert::alert')
</body>
</html>