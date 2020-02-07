@extends('layouts/app')
@section('title', 'Top')
@section('content')
<div class="side-bar">
  <form action="{{ route('top.search') }}" method="post">
    @csrf
    <h2>Search Form</h2>
    <label for="prefecture_id">Prefecture</label>
    <select id="prefecture_id" name="prefecture_id">
      <option value="">Please Choose Below</option>
      @foreach ($prefectures as $prefecture)
      <option value="{{ $prefecture->id }}" @if ($prefecture->id == $prefecture_id) selected @endif>{{ $prefecture->name }}</option>
      @endforeach
    </select>
    <label for="animal_category_id">Animal Species</label>
    <select id="animal_category_id" name="animal_category_id">
      <option value="">Please Choose Below</option>
      @foreach ($animalCategories as $animalCategory)
      <option value="{{ $animalCategory->id }}" @if ($animalCategory->id == $animal_category_id) selected @endif>{{ $animalCategory->name }}</option>
      @endforeach
    </select>
    <input type="submit" value="Search">
  </form>
</div>
<div class="main-wrapper">
  <div class="pets">
    @foreach ($pets as $pet)
    <div class="pet">
      <a href="{{ route('top.detail', ['id' => $pet->id]) }}">
        @if ($pet->pic1)
        <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="">
        @else
        <img src="{{ asset('img/noimage.png') }}" alt="">
        @endif
        <h2 class="pet-name">{{ $pet->name }}</h2>
        <p class="pet-info">
          <span class="pet-gender">
            @switch ($pet->gender)
              @case (1)
                Male
                @break
              @case (2)
                Female
                @break
              @case (3)
                Other
                @break
            @endswitch
          </span>
          <span class="pet-category">{{ $pet->animalCategory->name }}</span>
        </p>
        <p class="pet-prefecture">{{ $pet->user->prefecture->name }}</p>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
