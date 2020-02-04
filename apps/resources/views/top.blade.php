@extends('layouts/app')
@section('title', 'Top')
@section('content')
<div class="side-bar">
<form class="" action="{{ route('pet.search') }}" method="post">
<label for="">Prefecture</label>
<select class="" name="prefecture_id">
  <option value="">Please Choose Below</option>
  @foreach ($prefectures as $prefecture)
  <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
  @endforeach
</select>
</form>
</div>
<div class="main-wrapper">
<div class="pets">
  @foreach ($pets as $pet)
  <div class="pet">
    <img src="public/user_thumbnails/{{ $pet->thumbnail }}" alt="">
    <h2 class="pet-name">{{ $pet->name }}</h2>
  </div>
  @endforeach
</div>
</div>
@endsection
