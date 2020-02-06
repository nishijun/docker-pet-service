@extends('layouts/app')
@section('title', 'Top')
@section('content')
<div class="side-bar">
  <form class="" action="{{ route('top.search') }}" method="post">
    @csrf
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
