@extends('layouts.app')
@section('title', 'Reset')
@section('content')
<div class="auth-container">
  <form class="auth-form" method="POST" action="{{ route('password.update') }}">
    @csrf
    <h1 class="auth-title">{{ __('Reset Password') }}</h1>
    <div class="auth-title-line"></div>
    <input type="hidden" name="token" value="{{ $token }}">

    <!-- Email -->
    <label for="email" class="auth-form-label">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" class="auth-form-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <!-- Password -->
    <label for="password" class="auth-form-label">{{ __('Password') }}</label>
    <input id="password" type="password" class="auth-form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <label for="password-confirm" class="auth-form-label">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="auth-form-input" name="password_confirmation" required autocomplete="new-password">

    <!-- Submit -->
    <button type="submit" class="auth-form-submit">{{ __('Reset Password') }}</button>
  </form>
</div>



@endsection
