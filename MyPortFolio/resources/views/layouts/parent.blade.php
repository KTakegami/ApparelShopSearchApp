<!DOCTYPE html>
<html style="height:100%;" lang=" {{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Style -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/74b4cb0617.js" crossorigin="anonymous"></script>

</head>

<body class="bg-light" style="min-height:100vh; position:relative;">
  @yield('header')

  @yield('content')

  @yield('footer')

  <script src=" {{ asset('js/app.js') }} " defer></script>
</body>

</html>