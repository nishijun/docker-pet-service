@extends('layouts.app')
@section('title', 'Detail')
@section('content')
<div class="favorite-area">
  <i class="fas fa-heart js-click-favorite" id='favorite' data-pet="{{ $pet->id }}"></i>
</div>
<div class="pic-area">
  <span>{{ $pet->animalCategory->name }}</span>
  <div class="main-pic">
    <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="">
  </div>
  <div class="sub-pic">
    @if ($pet->pic2)
    <img src="/storage/pet_thumbnails/{{ $pet->pic2 }}" alt="">
    @else
    <img src="{{ asset('img/noimage.png') }}" alt="">
    @endif
    @if ($pet->pic3)
    <img src="/storage/pet_thumbnails/{{ $pet->pic3 }}" alt="">
    @else
    <img src="{{ asset('img/noimage.png') }}" alt="">
    @endif
  </div>
</div>
<div class="detail-area">
  <ul>
    <li>{{ $pet->name }}</li>
    <li>{{ $pet->age }}</li>
    <li>
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
    </li>
    <li>{{ $pet->price }}</li>
    <li>{{ $pet->user->name }}</li>
    <li>{{ $pet->user->prefecture->name }}</li>
  </ul>
  <div>{{ $pet->body }}</div>
</div>
<div class="apply-area">
  @if ($pet->user_id === Auth::id())
    <p>Your pet</p>
  @else
    <form action="{{ route('board1', ['id' => $pet->id]) }}" method="post">
      @csrf
      <input type="text" name="sell_user_id" value="{{ $pet->user->id }}" style="display:none;">
      <input type="submit" value="Contact Owner">
    </form>
  @endif
</div>
@endsection
