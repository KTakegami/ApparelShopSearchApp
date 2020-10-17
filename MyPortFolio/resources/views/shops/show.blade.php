@extends('layouts.parent')

@include('layouts.header')

@section('content')
<div class="container mt-5" style="padding-bottom: 170px;">
  <div class="row">
    <div class="col-12 col-sm-6">
      @if(isset($shop->shop_image))
      <div class="shop-img" style="background-image:url('/storage/{{ $shop->shop_image }}');"></div>
      @else
      <div class="shop-img bg-white d-flex justify-content-center align-items-center">
        <p>NoImage</p>
      </div>
      @endif
    </div>
    <div class="col-12 mt-4 mt-sm-0 col-sm-6">
      <div class="shop-Details">
        <dl>
          <dt>ショップ名：</dt>
          <dd>{{$shop->shop_name}}</dd>
          <hr>
          <dt>住所：</dt>
          <dd>{{optional($shop->prefecture)->prefectures}}{{$shop->shop_address}}</dd>
          <hr>
          <dt>ジャンル：</dt>
          <dd>{{$shop->genre->genre}}</dd>
          <hr>
          <dt>取扱商品：</dt>
          <dd>{{$shop->product->product}}</dd>
        </dl>
      </div>

      @if($user_id == $shop->user_id)
      <div id="edit">
        <button class="p-0 bg-light" style="border:0; color:blue;">
          <a style="text-decoration:none;" href=" {{ route('shops.edit', $shop->id) }}">編集する</a>
        </button>
      </div>
      <div>
        <form action="{{ route('shops.destroy', $shop->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button class="p-0 bg-light" type="submit" style="border:0; color:red; outline: none">
            削除する</button>
        </form>
      </div>
      @endif

      <!-- いいね機能 -->
      @if($shop->favorited_authUser())
      <a href="{{ route('shops.unfavorite',$shop->id) }}" style="text-decoration:none;" class="text-dark">
        <i class="far fa-star"></i>
        {{$shop->favorites->count()}}
      </a>
      @else
      <a href="{{ route('shops.favorite', $shop->id)}}" style="text-decoration:none;" class="text-warning">
        <i class="far fa-star"></i>
        {{$shop->favorites->count()}}
      </a>
      @endif
      <!-- いいね機能 終 -->

    </div>

    <div class="col-12 mt-3">
      <dl>
        <dt>ショップ説明</dt>
        <dd class="shop-des p-3">{{$shop->shop_description}}</dd>
      </dl>
    </div>
  </div>
</div>

@include('layouts.footer')

@endsection