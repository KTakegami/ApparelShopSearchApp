@section('header')
<header class="navbar navbar-expand bg-info">
  @if(Route::has('login'))
  @auth
  <a href="{{ url('/shops') }}" class="navbar-brand text-dark">ApparelShopSearch</a>
  @else
  <a href="{{ url('/') }}" class="navbar-brand text-dark">ApparelShopSearch</a>
  @endauth
  @endif

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
          <a class="nav-link" href="{{ route('mypage.show',$user->id ) }}">
            マイページ
          </a>
        </button>
      </li>
      <li class="nav-item">
        <button class="btn btn-danger p-0">
          <a href="{{ url('/') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='nav-link'>
            <!-- フォームを発火 -->
            ログアウト
          </a>
        </button>
      </li>
      @else

      @if (Route::has('register'))
      <li class="nav-item">
        <button class="btn btn-success p-0">
          <a class="nav-link" href="{{ route('register') }}">新規登録</a>
        </button>
      </li>
      @endif
      <li class="nav-item">
        <button class="btn btn-warning p-0">
          <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </button>
      </li>
      <form id="guest-login" method="get" action="guest">
        <li class="nav-item">
          <button class="btn btn-danger p-0">
            <a class="nav-link">ゲストログイン</a>
          </button>
        </li>
      </form>
      @endauth
    </ul>
    @endif
  </div>


  <form id="logout-form" action="{{ url('/') }}" method="POST" class="d-none">
    @csrf
  </form>
</header>
@endsection