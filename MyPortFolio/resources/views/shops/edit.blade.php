@extends('layouts.parent')

@section('title','ショップ編集')

@include('layouts.header')

@section('content')
<div class="container mt-5" style="padding-bottom:170px;">
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form method="post" action="{{ route('shops.update',$shop->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group row">
      <div class="col-md-12">
        <input id="shop_name" name="shopName" class="form-control" type="text" value="{{ $shop->shop_name }}">

        <textarea class="form-control mt-2" name="shop_description" id="description" cols="30" rows="5">{{ $shop->shop_description }}</textarea>

        <div class="form-group row">
          <div class="col-md-6">
            <label class="mt-2" for="genre">ジャンル</label>
            <select class="form-control" id="genre" name="genre">
              <option value="{{$shop->genre_id}}" selected>{{$shop->genre->genre}}</option>
              <option value="1">ストリート</option>
              <option value="2">モード</option>
              <option value="3">ミリタリー</option>
              <option value="4">カジュアル</option>
              <option value="5">きれいめ</option>
              <option value="6">ビジネス</option>
              <option value="7">その他</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="mt-2" for="product">取扱商品</label>
            <select class="form-control" id="product" name="product">
              <option value="{{$shop->product_id}}" selected>{{$shop->product->product}}</option>
              <option value="1">メンズ</option>
              <option value="2">レディース</option>
              <option value="3">子供服</option>
              <option value="4">靴</option>
              <option value="5">アクセサリー</option>
              <option value="6">その他</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="prefectures">都道府県</label>
            <select class="form-control" name="pref_code" id="prefectures">
              <option value="{{$shop->prefecture_id}}" selected>{{$shop->prefecture->prefectures}}</option>
              @foreach($prefs as $index => $name)
              <option value="{{ $index }}">{{$name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label for="address">住所</label>
            <input class="form-control" id="address" type="text" name="address" value="{{$shop->shop_address}}">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="shopimage">ショップの画像</label>
            <input class="form-control" id="shopimage" type="file" name="shop_image" accept="image/*">
            @if(isset($shop->shop_image))
            <div class="container mt-2">
              <span class="ml-2">登録済みの写真</span>
              <img src="/storage/{{ $shop->shop_image }}" style="width:100px;height:100px">
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="submit d-flex justify-content-center">
      <button class="btn btn-primary p-2" type="submit">
        <i class="fas fa-tshirt"></i>
        更新する
      </button>
    </div>
  </form>
</div>

@include('layouts.footer')

@endsection