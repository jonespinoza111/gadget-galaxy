<?php
    use App\Http\Controllers\ProductController;
    $total=0;
    if(Session::has('user')) {
        $total=ProductController::cartItem();
    }
?>
<!-- navbar -->
<nav class="flex justify-between bg-gray-900 text-white w-screen">
<div class="px-5 xl:px-12 py-6 flex w-full items-center">
    <a class="text-3xl font-bold font-heading" href="/">
    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
    Logo Here.
    </a>
    <!-- Nav Links -->
    <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
    <li><a class="hover:text-gray-200" href="/">Home</a></li>
    <li><a class="hover:text-gray-200" href="/admin">Catagory</a></li>
    <li><a class="hover:text-gray-200" href="#">Collections</a></li>
    <li><a class="hover:text-gray-200" href="#">Contact Us</a></li>
    </ul>
    <!-- Header Icons -->
    <div class="hidden xl:flex items-center space-x-5 items-center">
    <a class="hover:text-gray-200" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </a>
    <a class="flex items-center hover:text-gray-200" href="/cartlist">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative flex justify-center items-center rounded-full h-3 w-3 bg-pink-500">
            {{$total}}</span>
        </span>
    </a>
    <div class="relative inline-block text-left">
        <div>
          <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
            @if(Session::has('user'))
            {{Session::get('user')['name']}}
            @else
            Options
            @endif
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      
        <!--
          Dropdown menu, show/hide based on menu state.
      
          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
          <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->

            @if(Session::has('user'))
              @if(Session::get('user')['role_as'] == "1")
              <a href="/admin" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Dashboard</a>
              @endif
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account Settings</a>
            <a href="/myorders" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">My Orders</a>
            <a href="/logout" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Logout</a>            
            {{-- <form method="POST" action="#" role="none">
              <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Logout</button>
            </form> --}}
            @else
            <a href="/login" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Login</a>
            <a href="/register" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Register</a>
            @endif
          </div>
        </div>
      </div>
    <!-- Sign In / Register      -->
    <a class="flex items-center hover:text-gray-200" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </a>
    
    </div>
</div>
<!-- Responsive navbar -->
<a class="xl:hidden flex mr-6 items-center" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span class="flex absolute -mt-5 ml-4">
    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75">
        <span class="text-white"></span>
    </span>
    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
        <span class="text-white"></span>
    </span>
    </span>
</a>
<a class="navbar-burger self-center mr-12 xl:hidden" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</a>
</nav>