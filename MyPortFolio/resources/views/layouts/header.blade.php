<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ApparelShopSearch</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/74b4cb0617.js" crossorigin="anonymous"></script>

</head>

<body>
  <header class="navbar navbar-expand bg-light">
    <a href="{{ url('/') }}" class="navbar-brand text-dark">ApparelShopSearch</a>

    <div class="collapse navbar-collapse">
      @if (Route::has('login'))
      <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item">
          <button class="btn btn-secondary">
            <a class="nav-link" href="{{ url('/shops/create') }}">
              <i class="fas fa-pen-square"></i>
              新規投稿
            </a>
          </button>
        </li>
        <li class="nav-item">
          <button class="btn btn-warning">
            <a class="nav-link" href="{{ url('/mypage') }}">
              マイページ
            </a>
          </button>
        </li>
        <li class="nav-item">
          <button class="btn btn-primary"><a class="nav-link" href="{{ url('/home') }}">ホーム</a></button>
        </li>
        @else
        <form id="guest-login" method="get" action="guest">
          <li>
            <button class="btn btn-secondary">
              <a class="nav-link">ゲストログイン</a>
            </button>
          </li>
        </form>
        <li class="nav-item">
          <button class="btn btn-info">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
          </button>
        </li>

        @if (Route::has('register'))
        <li class="nav-item">
          <button class="btn btn-success">
            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
          </button>
        </li>
        @endif
        @endauth
      </ul>
      @endif
    </div>
  </header>

  @yield('content')
</body>

</html>