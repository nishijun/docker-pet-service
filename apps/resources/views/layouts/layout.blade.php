<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>PetService | @yield('title')</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="header">
  <a href="#" class="header-left">Pet</a>
  <ul class="header-right">
    <li class="header-right-item js-click-login">Login</li>
    <li class="header-right-item js-click-signup">Signup</li>
  </ul>
</header>

<!-- Modal Signup -->
<div class="black-cover js-signup-modal">
  <div class="modal">
    <i class="fas fa-times js-click-modal"></i>
    <form class="modal-form" method="post" action="{{ route('home.auth') }}">
      @csrf
      <h2 class="modal-form-title">Signup</h2>
      <p class="modal-form-label">Name</p>
      <input type="text" name="text" class="modal-form-input">
      <p class="modal-form-label">Your Prefecture</p>
      <select class="modal-form-input" name="prefecture_id">
        <option value="" selected>選択して下さい</option>
        @foreach ($prefectures as $prefecture)
        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
        @endforeach
      </select>
      <p class="modal-form-label">Email</p>
      <input type="email" name="email" class="modal-form-input">
      <p class="modal-form-label">Password</p>
      <input type="password" name="password" class="modal-form-input">
      <input type="submit" value="Signup" class="modal-form-submit">
      <div class="cb"></div>
    </form>
  </div>
</div>

<!-- Modal Login-->
<div class="black-cover js-login-modal">
  <div class="modal">
    <i class="fas fa-times js-click-modal"></i>
    <form class="modal-form" method="post" action="{{ route('home.auth') }}">
      @csrf
      <h2 class="modal-form-title">Login</h2>
      <p class="modal-form-label">Email</p>
      <input type="email" name="email" class="modal-form-input">
      <p class="modal-form-label">Password</p>
      <input type="password" name="password" class="modal-form-input">
      <input type="submit" value="Login" class="modal-form-submit">
      <div class="cb"></div>
    </form>
  </div>
</div>

<!-- Main -->
<main class="py-4">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">Copyright Â© Junya Nishiwaki. All Rights Reserved</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>
