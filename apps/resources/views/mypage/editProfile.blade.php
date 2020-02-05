@extends('layouts.mypage')
@section('title', 'editProfile')
@section('content')
<h1>Edit Profile</h1>
<form class="" action="{{ route('mypage.updateUser') }}" method="post" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label>
  <input id="name" type="text" name="name" value="{{ $user->name }}">
  @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
  <label for="email">Email</label>
  <input id="email" type="email" name="email" value="{{ $user->email }}">
  @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
  <label for="gender">Gender</label>
  <input type="radio" name="gender" value="1" @if ($user->gender === 1) checked @endif>Man
  <input type="radio" name="gender" value="2" @if ($user->gender === 2) checked @endif>Woman
  <input type="radio" name="gender" value="3" @if ($user->gender === 3) checked @endif>Other
  <label for="age">Age</label>
  <select id="age" name="age">
    @for ($i = 0; $i <= 130; $i++)
    <option value="{{ $i }}" @if ($user->age === $i) selected @endif>{{ $i }}</option>
    @endfor
  </select>
  <label for="prefecture_id">Prefecture</label>
  <select id="prefecture_id" name="prefecture_id">
    @foreach ($prefectures as $prefecture)
    <option value="{{ $prefecture->id }}" @if ($user->prefecture_id === $prefecture->id) selected @endif>{{ $prefecture->name }}</option>
    @endforeach
  </select>
  <label for="thumbnail">thumbnail</label>
  <input type="file" name="thumbnail" value="{{ old('thumbnail') }}">
  @error('thumbnail')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
  <input type="submit" value="Update">
</form>
@endsection
