@extends('layouts.app')
@section('title', 'Reset')
@section('content')
<div class="auth-container">
  <form method="POST" action="{{ route('password.confirm') }}" class="form">
    @csrf
    <h1 class="section-title">{{ __('Confirm Password') }}</h1>
    <div class="title-line"></div>
    <p>{{ __('Please confirm your password before continuing.') }}</p>

    <!-- Password -->
    <label for="password" class="form-label">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <!-- Submit -->
    <button type="submit" class="form-submit">{{ __('Confirm Password') }}</button>

    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
    @endif
  </form>
</div>
@endsection
