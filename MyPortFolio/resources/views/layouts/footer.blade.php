@section('footer')
<footer class="container-fuild d-flex justify-content-center align-items-center bg-secondary" style="
  height:150px;
  width:100%;
  position:absolute;
  bottom:0;"
>
  <button class="btn btn-danger">
    <a href="{{ url('/') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white" style="text-decoration:none">
      <!-- フォームを発火 -->
      ログアウト
    </a>
  </button>

  <form id="logout-form" action="{{ url('/') }}" method="POST" class="d-none">
    @csrf
  </form>
</footer>
@endsection