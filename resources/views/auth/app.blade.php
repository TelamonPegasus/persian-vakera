<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
</head>
<body class="bg">
    <div id="app">
        @yield('content')
    </div>
    @stack('script')
</body>
</html>
