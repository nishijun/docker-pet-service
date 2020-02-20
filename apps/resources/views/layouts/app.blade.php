<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Pet | @yield('title')</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="js-whole"></div>
<!-- Header -->
<header class="header">
  <a href='/' class="header-left">Pet</a>
  <div class="header-right">
  @guest
    <ul class="header-right-menu">
      <li class="header-right-menu-item">
        <a class="header-right-menu-item-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      <li class="header-right-menu-item">
        <a class="header-right-menu-item-link" href="{{ route('register') }}">{{ __('Signup') }}</a>
      </li>
    </ul>

  @else
    <div class="header-right-menu">
      <p class="header-right-userName js-click-userMenu">
        {{ Auth::user()->name }}
        <span class="header-right-userName-icon">
          <i class="fas fa-caret-down"></i>
        </span>
      </p>
      @if (Auth::user()->thumbnail)
      <img class="header-right-thumbnail" src="/storage/user_thumbnails/{{ Auth::user()->thumbnail }}" alt="User thumbnail">
      @else
      <img class="header-right-thumbnail" src="{{ asset('img/noimage.png') }}" alt="No image">
      @endif
    </div>

    <!-- NavbarToggler -->
    <div class="header-right-hidden js-click-showUserMenu">
      <ul class="header-right-hidden-menu">
        <li class="header-right-hidden-menu-item">
          <a class="header-right-hidden-menu-item-link" href="{{ route('mypage') }}">
            {{ __('MyPage') }}
          </a>
        </li>
        <li class="header-right-hidden-menu-item">
          <a class="header-right-hidden-menu-item-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </div>
  @endguest
  </div>
</header>

<!-- Main Contents -->
<main id="main">
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
  <p class="footer-left">Pet</p>
  <p class="footer-right">Copyright ©<a href="https://twitter.com/Junya_Singer">Junya Nishiwaki</a> All Right Reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>
