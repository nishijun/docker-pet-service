@extends('layouts.mypage')
@section('title', 'MyPage')
@section('content')
<h1 class="section-title">My Page</h1>
<div class="title-line"></div>

<!-- Pets -->
<h2 class="mypage-title">Your Pets</h2>
<div class="my-pets">
  @if ($pets)
    @foreach ($pets as $pet)
    <div class="my-pet">
      <a href="{{ route('mypage.editPet1', ['id' => $pet->id]) }}">
        <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="Pet thumbnail">
        <ul>
          <li><span>{{ $pet->name }}</span> ({{ $pet->age }})</li>
          <li>
            <span>{{ $pet->animalCategory->name }}</span>
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
          </li>
        </ul>
      </a>
    </div>
    @endforeach
  @else
    <p class="nodata">No data</p>
  @endif
</div>

<!-- Boards -->
<h2 class="mypage-title">Your Boards</h2>
<div class="my-boards">
  <h3 class="myboard-title">Sell Board</h3>
  <div class="my-boards send">
    <table>
      <thead>
        <tr><th>Last send date</th><th>The buyer</th><th>The pet with dealing</th></tr>
      </thead>
      <tbody>
      @if ($boards_sell)
        @foreach ($boards_sell as $board_sell)
          <tr data-href="{{ route('board2', ['id' => $board_sell->pet_id, 'bId' => $board_sell->id]) }}" class="table-link">
            <td>{{ $board_sell->messages->last()->created_at }}</td>
            <td>{{ $board_sell->user->find($board_sell->buy_user_id)->name }}</td>
            <td>{{ $board_sell->pet->name }}</td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="3">No data</td></tr>
      @endif
      </tbody>
    </table>
  </div>
  <h3 class="myboard-title">Buy Board</h3>
  <div class="my-boards buy">
    <table>
      <thead>
        <tr><th>Last send date</th><th>The owner</th><th>The pet with dealing</th></tr>
      </thead>
      <tbody>
      @if ($boards_buy)
        @foreach ($boards_buy as $board_buy)
          <tr data-href="{{ route('board2', ['id' => $board_buy->pet_id, 'bId' => $board_buy->id]) }}" class="table-link">
            <td>{{ $board_buy->messages->last()->created_at }}</td>
            <td>{{ $board_buy->user->name }}</td>
            <td>{{ $board_buy->pet->name }}</td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="3">No data</td></tr>
      @endif
      </tbody>
    </table>
  </div>
</div>

<!-- Favorites -->
<h2 class="mypage-title">Your Favorites</h2>
<div class="my-pets">
@if ($favorites)
  @foreach ($favorites as $favorite)
  <div class="my-pet">
    <a href="{{ route('top.detail', ['id' => $favorite->pet_id]) }}">
      <img src="/storage/pet_thumbnails/{{ $favorite->pet->pic1 }}" alt="Pet thumbnail">
      <ul>
        <li><span>{{ $favorite->pet->name }}</span> ({{ $favorite->pet->age }})</li>
        <li>
          <span>{{ $favorite->pet->animalCategory->name }}</span>
          @switch ($favorite->pet->gender)
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
        </li>
      </ul>
    </a>
  </div>
  @endforeach
@else
  <p class="nodata">No data</p>
@endif
</div>
@endsection
