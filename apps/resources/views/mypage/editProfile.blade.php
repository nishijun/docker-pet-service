@extends('layouts.mypage')
@section('title', 'Edit Profile')
@section('content')
<form class="form" action="{{ route('mypage.updateUser') }}" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="section-title">Edit Profile</h1>
  <div class="title-line"></div>

  <!-- Name -->
  <label for="name" class="form-label">Name</label><span class="form-required">Required</span>
  <input id="name" type="text" name="name" value="{{ $user->name }}" class="form-input" required>
  @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror

  <!-- Email -->
  <label for="email" class="form-label" required>Email</label><span class="form-required">Required</span>
  <input id="email" type="email" name="email" value="{{ $user->email }}" class="form-input" required>
  @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror

  <!-- Gender -->
  <label for="gender" class="form-label">Gender</label><br>
  <input class="form-radio" type="radio" name="gender" value="1" @if ($user->gender === 1) checked @endif>Man
  <input class="form-radio" type="radio" name="gender" value="2" @if ($user->gender === 2) checked @endif>Woman
  <input class="form-radio" type="radio" name="gender" value="3" @if ($user->gender === 3) checked @endif>Other<br>

  <!-- Age -->
  <label for="age" class="form-label">Age</label>
  <div class="cp_ipselect cp_sl04">
    <select id="age" name="age" class="form-select">
      <option value="">Choose Below</option>
      @for ($i = 0; $i <= 130; $i++)
      <option value="{{ $i }}" @if ($user->age === $i) selected @endif>{{ $i }}</option>
      @endfor
    </select>
  </div>

  <!-- Prefecture -->
  <label for="prefecture_id" class="form-label">Prefecture</label><span class="form-required">Required</span><br>
  <div class="cp_ipselect cp_sl04">
    <select id="prefecture_id" name="prefecture_id" class="form-select">
      @foreach ($prefectures as $prefecture)
      <option value="{{ $prefecture->id }}" @if ($user->prefecture_id === $prefecture->id) selected @endif>{{ $prefecture->name }}</option>
      @endforeach
    </select>
  </div>

  <!-- Thumbnail -->
  <label for="thumbnail" class="form-label">thumbnail</label><br>
  <div class="form-image js-image-area">
    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" class="form-image-file js-image">
    <img class="prev-img" alt="User thumbnail" @if ($user->thumbnail) src="/storage/user_thumbnails/{{ $user->thumbnail }}" @else style="display:none;" @endif>
    Choose your picture
  </div>
  @error('thumbnail')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror

  <!-- Submit -->
  <input type="submit" value="Update" class="form-submit">
</form>
@endsection
