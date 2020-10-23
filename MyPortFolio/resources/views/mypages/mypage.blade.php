@extends("layouts.parent")

@section('title','マイページ')

@include('layouts.header')

@section('content')

<div class="container mt-5">
  <div class="row user_info">
    <div class="col-6 text-center">
      @if(isset($user->profile_image))
      <img class="img">
      @else
      <p class="text-center rounded-circle bg-white p-5"><i class="fas fa-user fa-7x"></i></p>
      @endif
      <a href="mypage/Edit">編集</a>
    </div>
    <div class="col-6">
      <h2 class="border border-dark">{{$user->name}}さん</h2>
      @if(isset($user->self_introduction))
      <p class="border border-dark">{{$user->self_introduction}}</p>
      @else
      <p class="border border-dark">自己紹介を書こう！</p>
      @endif
    </div>
  </div>

  <hr>

  <div id="myContent">
    <div class="row tabs text-center">
      <div class="col-6">
        <p v-on:click="change('0')" :class="{'active': isActive === '0'}">いいねしたショップ</p>
      </div>
      <div class="col-6">
        <p v-on:click="change('1')" :class="{'active': isActive === '1'}">お気に入りのショップ</p>
      </div>
    </div>

    <div class="content">
      <div class="one d-flex" v-if="isActive === '0'">
        <div class=" bg-info mr-3" style="width:200px;height:100px">いいね</div>
      <div class="bg-info mr-3" style="width:200px;height:100px">いいね</div>
      <div class="bg-info mr-3" style="width:200px;height:100px">いいね</div>
      <div class="bg-info" style="width:200px;height:100px">いいね</div>
    </div>
    <div class="two d-flex" v-else-if="isActive === '1'">
      <div class="bg-danger mr-3" style="width:200px;height:100px">お気に入り</div>
      <div class="bg-danger mr-3" style="width:200px;height:100px">お気に入り</div>
      <div class="bg-danger mr-3" style="width:200px;height:100px">お気に入り</div>
      <div class="bg-danger" style="width:200px;height:100px">お気に入り</div>
    </div>
  </div>

</div>

</div>

@endsection