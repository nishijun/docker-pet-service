@extends('layouts.mypage')
@section('title', 'Change Password')
@section('content')
<h1>Change Password</h1>
<form action="{{ route('mypage.updatePassword') }}" method="post">
  @csrf
  @switch ($token)
    @case(0)
    @if (Session::has('error'))
      <p>{{ session('error') }}</p>
    @endif
      <label for="password">Current Password</label>
      <input type="password" name="password">
      @error('password')
        <p>{{ $message }}</p>
      @enderror
      <input type="text" name="token" value="0" style="display:none;">
      <input type="submit" value="Send">
      @break

    @case(1)
      @if (Session::has('error'))
        <p>{{ session('error') }}</p>
      @endif
      <label for="">New Password</label>
      <input type="password" name="password">
      @error('password')
        <p>{{ $message }}</p>
      @enderror
      <label for="">Password Again</label>
      <input type="password" name="password_re">
      <input type="text" name="token" value="1" style="display:none;">
      <input type="submit" value="Change password">
  @endswitch
</form>
@endsection
