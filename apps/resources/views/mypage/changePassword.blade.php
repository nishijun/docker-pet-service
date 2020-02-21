@extends('layouts.mypage')
@section('title', 'Change Password')
@section('content')
<form class="form" action="{{ route('mypage.updatePassword') }}" method="post">
  @csrf
  <h1 class="section-title">Change Password</h1>
  <div class="title-line"></div>
  @switch ($token)
    @case(0)
      @if (Session::has('error'))
        <p>{{ session('error') }}</p>
      @endif
      <label class="form-label" for="password">Current Password</label><br>
      <input id="password" type="password" name="password" class="form-input">
      @error('password')
        <p>{{ $message }}</p>
      @enderror
      <input type="text" name="token" value="0" style="display:none;">
      <input type="submit" value="Send" class="form-submit">
      @break

    @case(1)
      @if (Session::has('error'))
        <p>{{ session('error') }}</p>
      @endif
      <label for="new-password" class="form-label">New Password</label>
      <input id="new-password" type="password" name="password" class="form-input">
      @error('password')
        <p>{{ $message }}</p>
      @enderror
      <label for="password-again" class="form-label">Password Again</label>
      <input id="password-again" type="password" name="password_re" class="form-input">
      <input type="text" name="token" value="1" style="display:none;">
      <input type="submit" value="Change" class="form-submit">
  @endswitch
</form>
@endsection
