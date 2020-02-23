@extends('layouts.app')
@section('title', 'Board')
@section('content')
<div class="container-board">

  <!-- Border top -->
  <div class="board-top">
    <div class="sell-user">
      @if ($board->user->thumbnail)
        <img src="/storage/user_thumbnails/{{ $board->user->thumbnail }}" alt="User thumbnail">
      @else
        <img src="{{ asset('img/noimage.png') }}" alt="No image">
      @endif
      <ul>
        <li><span>{{ $board->user->name }}</span> ({{ $board->user->age }})</li>
        <li>
        @switch ($board->user->gender)
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
        <li>{{ $board->user->prefecture->name }}</li>
      </ul>
    </div>

    <div class="pet">
      <ul>
        <li>Pet Information</li>
        <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="Pet thumbnail">
        <li><span>{{ $pet->name }}</span> ({{ $pet->age }})</li>
        <li>
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
        <li>{{ $pet->animalCategory->name }}</li>
        <li>¥ {{ $pet->price }}</li>
      </ul>
    </div>
  </div>
</div>
  <div class="message-area">
    <div class="messages">
    @if ($messages)
      @foreach ($messages as $message)
        <div class="message">
          @if ($message->user->thumbnail)
            <img src="/storage/user_thumbnails/{{ $message->user->thumbnail }}">
          @else
            <img src="{{ asset('img/noimage.png') }}" alt="">
          @endif
          <p>{{ $message->body }}</p>
          <p>{{ $message->created_at }}</p>
        </div>
      @endforeach
    @else
      <p>まだメッセージはありません</p>
    @endif
    </div>
    <form action="{{ route('message', ['id' => $pet->id, 'bId' => $board->id]) }}" method="post">
      @csrf
      <textarea name="body"></textarea>
      @error ('body')
        <p>{{ $message }}</p>
      @enderror
      <input type="submit" value="Send">
    </form>
  </div>
</div>
@endsection
