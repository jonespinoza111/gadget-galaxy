@extends('main')
@section("content")
<div class="container custom-product flex flex-row h-auto w-[100%] flex-wrap">
    @foreach ($products as $item)
        <a href="detail/{{$item['id']}}">
            <div class="max-w-sm my-5 mx-5 rounded overflow-hidden shadow-lg w-[20em] h-[30em]">
                <img class="w-full h-[15em]" src="{{$item['gallery']}}" alt="{{$item['gallery']}}">
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$item['name']}}</div>
                <p class="text-gray-700 text-base">
                    {{$item['description']}}
                </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                </div>
            </div>
        </a>
    @endforeach
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        <div class="flex flex-row">
            @foreach($products as $item)
            <a href="detail/{{$item['id']}}">
                <div class="mx-10">
                    <img class="trending-image" src="" />
                    <div class="">
                        <h3>{{$item['name']}}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection