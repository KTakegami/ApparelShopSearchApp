@extends('layouts.parent')

@section('title','ショップ一覧/検索')

@include('layouts.header')

@section('content')
<div class="main container mt-5 pt-2">
    <div class="row shop_search">
        <div class="col-12">
            <div class="search">絞り込み検索</div>
            <hr>

            <div class="search-body">
                <form method="get" action="{{ url('/shops')  }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="shopName">ショップ名</label>
                            <input class="form-control" id="shopName" name="shopName">
                        </div>
                        <div class="col-md-6">
                            <label for="genre">ジャンル</label>
                            <select class="form-control" id="genre" name="genre">
                                <option value="" selected>選択してください</option>
                                <option value="1">ストリート</option>
                                <option value="2">モード</option>
                                <option value="3">ミリタリー</option>
                                <option value="4">カジュアル</option>
                                <option value="5">きれいめ</option>
                                <option value="6">ビジネス</option>
                                <option value="7">その他</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="product">取扱商品</label>
                            <select class="form-control" id="product" name="product">
                                <option value="" selected>選択してください</option>
                                <option value="1">メンズ</option>
                                <option value="2">レディース</option>
                                <option value="3">子供服</option>
                                <option value="4">靴</option>
                                <option value="5">アクセサリー</option>
                                <option value="6">その他</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="prefectures">都道府県</label>
                            <select class="form-control" name="pref_code" id="prefectures">
                                <option value="" selected>選択してください</option>
                                @foreach ($prefs as $index => $name)
                                <option value="{{ $index }}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary p-2" type="submit">検索</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5" id="shopList">
        <div class="row">
            @if($shops->count())
            @foreach($shops as $shop)
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


                        <p>{{optional($shop->prefecture)->prefectures}}{{$shop->shop_address}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>検索条件に合ったショップが見つかりませんでした</p>
            @endif
        </div>

        <div class="paginate">
            {{ $shops->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection