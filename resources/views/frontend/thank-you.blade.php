@extends('main')
@section('title','Thank You For Shopping')
@section("content")
    <div class="w-full h-screen flex flex-row justify-center">
        <div class="flex flex-col my-10 items-center gap-y-4">
            <h3 class="text-[1.5em]">Thank you for shopping with {{$appSettings->website_name}}!</h3>
            <a href="{{ route('home') }}">
                <button class="w-[200px] px-4 py-2 bg-blue-200">Back to Shopping</button>
            </a>
        </div>
    </div>
@endsection