<form id="logout-form" action="{{ url('/') }}" method="POST" class="d-none">
  @csrf
</form>

<footer class="container-fuild d-flex justify-content-center align-items-center bg-light"
style="height: 150px; width:100%; position:absolute;bottom:0;">
  <button class="btn btn-warning p-2">
    <a href="{{ url('/') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white">
      <!-- フォームを発火 -->
      ログアウト
    </a>
  </button>

</footer>