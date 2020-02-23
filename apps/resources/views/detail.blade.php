@extends('layouts.app')
@section('title', 'Detail')
@section('content')
<div class="container-detail">

  <!-- Picture area -->
  <div class="pic-area">
    <div class="main-pic">
      <div class="option-area">
        @switch($pet->animal_category_id)
        @case(1)
        <i class="fas fa-cat"><br><span style="font-size:10px;">Cat</span></i>
        @break
        @case(2)
        <i class="fas fa-dog"><br><span style="font-size:10px;">Dog</span></i>
        @break
        @case(3)
        <i class="fas fa-dove"><br><span style="font-size:10px;">Bird</span></i>
        @break
        @case(4)
        <i class="fas fa-bug"><br><span style="font-size:10px;">Insect</span></i>
        @break
        @case(5)
        <i class="fas fa-question"><br><span style="font-size:10px;">Other</span></i>
        @break
        @endswitch

        @if ($pet->user_id !== Auth::id() && Auth::check())
          <i class="fas fa-heart js-click-favorite @if ($favorite) active @endif" id='favorite' data-pet="{{ $pet->id }}"></i>
        @endif
      </div>
      <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="Pet thumbnail" class="js-click-changeThumbnail-target">
    </div>
    <div class="sub-pic">
      @if ($pet->pic2)
      <img src="/storage/pet_thumbnails/{{ $pet->pic2 }}" alt="Pet thumbnail" class="js-click-changeThumbnail">
      @else
      <img src="{{ asset('img/noimage.png') }}" alt="">
      @endif
      @if ($pet->pic3)
      <img src="/storage/pet_thumbnails/{{ $pet->pic3 }}" alt="Pet thumbnail" class="js-click-changeThumbnail">
      @else
      <img src="{{ asset('img/noimage.png') }}" alt="">
      @endif
    </div>
  </div>

  <!-- Detail area -->
  <div class="detail-area">
    <table>
      <thead>
        <tr>
          <th>Name</th><th>Age</th><th>Gender</th><th>Price</th><th>Owner</th><th>Area</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $pet->name }}</td>
          <td>{{ $pet->age }}</td>
          <td>
          @switch ($pet->gender)
            @case (1)
              <i class="fas fa-mars"></i>
              @break
            @case (2)
              <i class="fas fa-venus"></i>
              @break
            @case (3)
              <i class="fas fa-mars-stroke-h"></i>
              @break
          @endswitch
          </td>
          <td>¥ {{ $pet->price }}</td>
          <td>
            <a href="{{ route('owner', ['id' => $pet->id]) }}">{{ $pet->user->name }}</a>
          </td>
          <td>{{ $pet->user->prefecture->name }}</td>
        </tr>
      </tbody>
    </table>
    <div class="body">{{ $pet->body }}</div>
  </div>

  <!-- Apply area -->
  <div class="apply-area">
    <a href="{{ route('top') }}"><i class="fas fa-chevron-left"></i> Back to PetList</a>
    @if ($pet->user_id === Auth::id())
      <p class="yourpet">Your pet</p>
    @else
      <form action="{{ route('board1', ['id' => $pet->id]) }}" method="post">
        @csrf
        <input type="text" name="sell_user_id" value="{{ $pet->user->id }}" style="display:none;">
        <input type="submit" value="Contact">
      </form>
    @endif
  </div>
</div>
@endsection
