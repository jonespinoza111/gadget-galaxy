<?php
    use App\Http\Controllers\ProductController;
    $total=0;
    if(Session::has('user')) {
        $total=ProductController::cartItem();
    }
?>
<!-- navbar -->
<nav class="flex flex-col bg-gray-900 text-white w-full">
<div class="px-5 xl:px-12 py-6 flex w-full items-center justify-between">
    <a class="text-3xl font-bold font-heading" href="/">
    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
    {{$appSettings->website_name ?? 'website name'}}
    </a>
    <!-- Nav Links -->
    
    <form class="hidden md:block space-x-12 w-[60%]" action="{{ url('search') }}" method="GET">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" value="{{ Request::get('search') }}" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Products..." required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    <!-- Header Icons -->
    <div class="hidden md:flex items-center space-x-5 mx-5">
    
    <a class="flex items-center hover:text-gray-200" href="/cart">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative flex justify-center items-center rounded-full h-3 w-3 bg-pink-500">
                <livewire:frontend.cart.cart-count />
            </span>
        </span>
    </a>
    <div class="relative inline-block text-left">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            @if(Session::has('user'))
            {{Session::get('user')['name']}}
            @else
            Options
            @endif
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 z-40">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              @if(Session::has('user'))
                @if(Session::get('user')['role_as'] == "1")
                    <li>
                    <a href="/admin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                @endif
                <li>
                    <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>
                <li>
                    <a href="/orders" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Orders</a>
                </li>
                <li>
                    <a href="/wishlist" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wishlist</a>
                </li>
                <li>
                    <a href="/logout" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                </li>
              @else
                <li>
                    <a href="/login" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Login</a>
                </li>
                <li>
                    <a href="/register" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Register</a>
                </li>
              @endif
            </ul>
        </div>

        
    </div>
    </div>
    <button data-collapse-toggle="navbar-hamburger" type="button" class="md:hidden inline-flex items-center z-30 justify-center p-2 w-10 h-10 ml-3 mr-5 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
</div>
<!-- Responsive navbar -->    
    <div class="w-full md:hidden flex flex-row justify-center items-center py-6">
        <form class="w-[90%]" action="{{ url('search') }}" method="GET">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" value="{{ Request::get('search') }}" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Products..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    
    <div class="hidden w-full" id="navbar-hamburger">
        <ul class="flex flex-col font-medium mt-4 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        @if(Session::has('user'))
            @if(Session::get('user')['role_as'] == "1")
                <li>
                    <a href="/admin" class="block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-current="page">Dashboard</a>
                </li>
            @endif
            <li>
                <a href="/profile" class="block py-2 pl-3 pr-4 text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-current="page">Profile</a>
            </li>
            <li>
                <a href="/cart" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Cart</a>
            </li>
            <li>
                <a href="/orders" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">My Orders</a>
            </li>
            <li>
                <a href="/wishlist" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">Wishlist</a>
            </li>
            <li>
                <a href="/logout" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Logout</a>
            </li>
            @else
                <li>
                    <a href="/login" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Login</a>
                </li>
                <li>
                    <a href="/register" class="block py-2 pl-3 pr-4 text-gray-900  hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Register</a>
                </li>
            @endif
        </ul>
    </div>

<div class="w-full bg-slate-400 py-4 md:py-2 px-5">
    <ul class="flex flex-col items-start md:flex-row px-4 mx-auto font-semibold font-heading gap-x-8 gap-y-3">
        <li><a class="hover:text-gray-200" href="{{ url('/home') }}">Home</a></li>
        <li><a class="hover:text-gray-200" href="{{ url('/collections') }}">All Categories</a></li>
        <li><a class="hover:text-gray-200" href="{{ url('/new-arrivals') }}">New Arrivals</a></li>
        <li><a class="hover:text-gray-200" href="{{ url('/featured-products') }}">Featured Products</a></li>
        <li><a class="hover:text-gray-200" href="{{ url('/trending-products') }}">Trending Products</a></li>
    </ul> 
</div>
</nav>