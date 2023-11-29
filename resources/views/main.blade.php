<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('icons8-gadget-bubbles-16.png') }}">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>@yield('title')</title>

    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="JE">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>
<body class="w-full">
    {{View::make('frontend.navbar.index')}}
    @yield('content')
    {{View::make('footer')}}
    @stack('scripts')
</body>
</html>