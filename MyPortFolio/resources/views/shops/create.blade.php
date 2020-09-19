@extends("layouts.header")

@section('content')

<div class="container mt-5">
  <form method="post" action="{{ route('shops.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <div class="col-md-12">
        <input id="shopName" name="name" class="form-control" type="text" placeholder="ショップ名を入力してください">

        <textarea class="form-control mt-2" name="description" id="description" cols="30" rows="5" placeholder="どんなショップですか？"></textarea>

        <div class="form-group row">
          <div class="col-md-6">
            <label class="mt-2" for="genre">ジャンル</label>
            <select class="form-control" id="genre" name="genre">
              <option value="" selected>選択してください</option>
              <option value="street">ストリート</option>
              <option value="mode">モード</option>
              <option value="military">ミリタリー</option>
              <option value="casual">カジュアル</option>
              <option value="clean">きれいめ</option>
              <option value="business">ビジネス</option>
              <option value="other">その他</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="mt-2" for="product">取扱商品</label>
            <select class="form-control" id="product" name="product">
              <option value="" selected>選択してください</option>
              <option value="men">メンズ</option>
              <option value="woman">レディース</option>
              <option value="kids">子供服</option>
              <option value="shoes">靴</option>
              <option value="accessories">アクセサリー</option>
              <option value="other">その他</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="prefectures">都道府県</label>
            <select class="form-control" name="prefectures" id="prefectures" name="prefecutures">
              <option value="" selected>選択してください</option>
              <option value="北海道">北海道</option>
              <option value="青森県">青森県</option>
              <option value="岩手県">岩手県</option>
              <option value="宮城県">宮城県</option>
              <option value="秋田県">秋田県</option>
              <option value="山形県">山形県</option>
              <option value="福島県">福島県</option>
              <option value="茨城県">茨城県</option>
              <option value="栃木県">栃木県</option>
              <option value="群馬県">群馬県</option>
              <option value="埼玉県">埼玉県</option>
              <option value="千葉県">千葉県</option>
              <option value="東京都">東京都</option>
              <option value="神奈川県">神奈川県</option>
              <option value="新潟県">新潟県</option>
              <option value="富山県">富山県</option>
              <option value="石川県">石川県</option>
              <option value="福井県">福井県</option>
              <option value="山梨県">山梨県</option>
              <option value="長野県">長野県</option>
              <option value="岐阜県">岐阜県</option>
              <option value="静岡県">静岡県</option>
              <option value="愛知県">愛知県</option>
              <option value="三重県">三重県</option>
              <option value="滋賀県">滋賀県</option>
              <option value="京都府">京都府</option>
              <option value="大阪府">大阪府</option>
              <option value="兵庫県">兵庫県</option>
              <option value="奈良県">奈良県</option>
              <option value="和歌山県">和歌山県</option>
              <option value="鳥取県">鳥取県</option>
              <option value="島根県">島根県</option>
              <option value="岡山県">岡山県</option>
              <option value="広島県">広島県</option>
              <option value="山口県">山口県</option>
              <option value="徳島県">徳島県</option>
              <option value="香川県">香川県</option>
              <option value="愛媛県">愛媛県</option>
              <option value="高知県">高知県</option>
              <option value="福岡県">福岡県</option>
              <option value="佐賀県">佐賀県</option>
              <option value="長崎県">長崎県</option>
              <option value="熊本県">熊本県</option>
              <option value="大分県">大分県</option>
              <option value="宮崎県">宮崎県</option>
              <option value="鹿児島県">鹿児島県</option>
              <option value="沖縄県">沖縄県</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="shopimage">ショップの画像</label>
            <input class="form-control" id="shopimage" type="file" name="shop_image">
          </div>
        </div>
      </div>

    </div>

    <div class="submit d-flex justify-content-center">
      <button class="btn btn-primary p-2" type="submit">
        <i class="fas fa-tshirt"></i>
        投稿する
      </button>
    </div>
  </form>
</div>


@endsection