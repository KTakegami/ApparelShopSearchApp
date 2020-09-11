@extends('layouts.header')

@section('content')
<div class="home container-fuild bg-secondary" style="height: 600px">
    <div class="row p-4">
        <h1>ようこそ</h1>
    </div>
</div>

<footer class="container-fuild d-flex justify-content-center align-items-center       bg-light" style="height: 150px;">
    <button class="btn btn-warning p-2">
        <a href="{{ url('/') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white">
        <!-- フォームを発火 -->
            ログアウト
        </a>
    </button>

    <form id="logout-form" action="{{ url('/') }}" method="POST" class="d-none">
        @csrf
    </form>
</footer>

@endsection