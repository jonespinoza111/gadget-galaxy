<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="JE">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset('build/assets/app-35f4a062.css')}}"></script>
    <script src="{{asset('build/assets/app-73316d6f.js')}}"></script>
</head>
<body class="w-[100%]">
    {{View::make('frontend.navbar.index')}}
    @yield('content')
    {{View::make('footer')}}
    @stack('scripts')
</body>
</html>