@section('header')
<header class="navbar navbar-expand bg-info">
  <a href="{{ url('/') }}" class="navbar-brand text-dark">ApparelShopSearch</a>

  <div class="collapse navbar-collapse">
    @if (Route::has('login'))
    <ul class="navbar-nav ml-auto">
      @auth
      <li class="nav-item">
        <button class="btn btn-success p-0">
          <a class="nav-link" href="{{ url('/shops/create') }}">
            <i class="fas fa-pen-square"></i>
            新規投稿
          </a>
        </button>
      </li>
      <li class="nav-item">
        <button class="btn btn-warning p-0">
          <a class="nav-link" href="{{ url('/mypage') }}">
            マイページ
          </a>
        </button>
      </li>
      <li class="nav-item">
        <button class="btn btn-primary p-0"><a class="nav-link" href="{{ url('/shops') }}">ショップ一覧</a></button>
      </li>
      @else
      <form id="guest-login" method="get" action="guest">
        <li>
          <button class="btn btn-danger p-0">
            <a class="nav-link">ゲストログイン</a>
          </button>
        </li>
      </form>
      <li class="nav-item">
        <button class="btn btn-warning p-0">
          <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </button>
      </li>

      @if (Route::has('register'))
      <li class="nav-item">
        <button class="btn btn-success p-0">
          <a class="nav-link" href="{{ route('register') }}">新規登録</a>
        </button>
      </li>
      @endif
      @endauth
    </ul>
    @endif
  </div>
</header>
@endsection