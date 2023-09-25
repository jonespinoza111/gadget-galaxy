@extends('main')
@section('title','All Categories')
@section("content")
<div class="container custom-product flex flex-row h-auto w-full min-h-screen">
    <div class="flex flex-col justify-center items-center md:justify-start md:items-start md:flex-row flex-wrap w-full h-auto m-6 gap-3">
        @forelse ($categories as $category)    
            <a href="{{ url('/collections/'.$category->slug) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl w-[18em] md:w-[15em] h-auto md:h-[300px] hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-fill md:object-cover w-full rounded-t-lg h-65 md:h-[80%] md:w-full md:rounded-none md:rounded-l-lg" src="{{ asset(''.$category->image) }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize">{{$category->name}}</h5>
                </div>
            </a>
        @empty
            <div>No categories available</div>
        @endforelse
    </div>

</div>
@endsection