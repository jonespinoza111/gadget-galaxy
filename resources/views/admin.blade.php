@extends('main')
@section('content')
    <div class="w-screen relative flex flex-col md:flex-row">
        @include('sidebar')
        @include('dashboard')
    </div>
@endsection