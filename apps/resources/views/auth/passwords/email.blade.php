@extends('layouts.app')
@section('title', 'Reset')
@section('content')
<div class="auth-container">
  <form class="auth-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <h1 class="auth-title">{{ __('Reset Password') }}</h1>
    <div class="auth-title-line"></div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Email -->
    <label for="email" class="auth-form-label">{{ __('E-Mail Address') }}</label><br>
    <input id="email" type="email" class="auth-form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <!-- Submit -->
    <button type="submit" class="auth-form-submit">
        {{ __('Send Password Reset Link') }}
    </button>
  </form>
</div>
@endsection
