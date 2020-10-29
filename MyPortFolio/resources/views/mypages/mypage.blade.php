@extends("layouts.parent")

@section('title','マイページ')

@include('layouts.header')

@section('content')

<div class="main container mt-5">
  <div class="row user_info text-center justify-content-center">
    <div class="col-12 col-sm-6">
      @if(isset($user->profile_image))
      <div class="user-img rounded-circle" style="background-image:url('/storage/{{ $user->profile_image }}');"></div>
      @else
      <p class="text-center rounded-circle bg-white p-5" style="width:100%;height:100%"><i class="fas fa-user fa-7x"></i></p>
      @endif
    </div>
    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
      <h2 class="border border-dark">{{$user->name}}さん</h2>
    </div>
    <a href="{{ route('mypage.edit', $user->id) }}">ユーザ情報を編集</a>
  </div>

  <hr>

  <div id="myContent">
    <div class="row tabs text-center">
      <div class="col-6">
        <p v-on:click="change('0')" :class="{'active': isActive === '0'}">投稿したショップ</p>
      </div>
      <div class="col-6">
        <p v-on:click="change('1')" :class="{'active': isActive === '1'}">お気に入りのショップ</p>
      </div>
    </div>

    <div class="content">
      <!-- 投稿したショップ -->
      <div class="row postShop" v-if="isActive === '0'">
        @foreach($postShops as $shop)
        <div class="col-6 col-md-4 col-lg-3 mb-3">
          <div class="shop-card container">
            <!-- 画像表示処理ここから -->
            @if(isset($shop->shop_image))
            <div>
              <img class="img" src="/storage/{{ $shop->shop_image }}">
            </div>
            @else
            <div class="img bg-white d-flex justify-content-center align-items-center">
              <p>NoImage</p>
            </div>
            @endif
            <!-- 画像表示処理ここまで -->
            <div class="shop-link mt-2">
              <a href="{{ route('shops.show', $shop->id) }}">{{$shop->shop_name}}</a>
              <p>{{optional($shop->prefecture)->prefectures}}{{$shop->shop_address}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- お気に入りしたショップ -->
      <div class="row favoriteShop" v-if="isActive === '1'">
        @foreach($favoriteShops as $shop)
        <div class="col-6 col-md-4 col-lg-3 mb-3">
          <div class="shop-card container">
            <!-- 画像表示処理ここから -->
            @if(isset($shop->shop_image))
            <div>
              <img class="img" src="/storage/{{ $shop->shop_image }}">
            </div>
            @else
            <div class="img bg-white d-flex justify-content-center align-items-center">
              <p>NoImage</p>
            </div>
            @endif
            <!-- 画像表示処理ここまで -->
            <div class="shop-link mt-2">
              <a href="{{ route('shops.show', $shop->id) }}">{{$shop->shop_name}}</a>
              <p>{{optional($shop->prefecture)->prefectures}}{{$shop->shop_address}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>

</div>

@endsection