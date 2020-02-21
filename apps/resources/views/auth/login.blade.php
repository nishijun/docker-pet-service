@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="auth-container">
  <form class="form" method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="section-title">{{ __('Login') }}</h1>
    <div class="title-line"></div>

    <!-- Email -->
    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label><br>
    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <!-- Password -->
    <label for="password" class="form-label">{{ __('Password') }}</label><br>
    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <!-- Keep login -->
    <input class="form-checkBox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">{{ __('Remember Me') }}</label><br>

    <!-- Submit -->
    <button type="submit" class="form-submit">{{ __('Login') }}</button>

    <!-- Password reminder -->
    <div class="form-link">
      <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    </div>
  </form>
</div>
@endsection
