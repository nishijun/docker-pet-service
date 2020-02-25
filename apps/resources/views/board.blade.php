@extends('layouts.app')
@section('title', 'Board')
@section('content')
<div class="container-board">

  <!-- Border top -->
  <div class="board-top">
    <div class="user-information">
      @if ($board->user->id !== Auth::id())
        @if ($board->user->thumbnail)
          <img src="/storage/user_thumbnails/{{ $board->user->thumbnail }}" alt="User thumbnail">
        @else
          <img src="{{ asset('img/noimage.png') }}" alt="No image">
        @endif
      @else
        @if ($board->user->find(Auth::id())->thumbnail)
          <img src="/storage/user_thumbnails/{{ $user->thumbnail }}" alt="User thumbnail">
        @else
          <img src="{{ asset('img/noimage.png') }}" alt="No image">
        @endif
      @endif
      <ul>
        <li>@if ($board->user->id !== Auth::id()) Owner @else Buyer @endif Information</li>
        <li>
        @if ($board->user->id !== Auth::id())
          <span>{{ $board->user->name }}</span>@if ($board->user->age) ({{ $board->user->age }}) @else <span>(No age data)</span> @endif
        @else
          <span>{{ $user->name }}</span>@if ($user->age) ({{ $user->age }}) @else <span>(No age data)</span> @endif
        @endif
        </li>
        <li>
        @if (($board->user->id !== Auth::id()))
          @if ($board->user->gender)
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
          @else
            <p>No gender data</p>
          @endif
        @else
          @if ($user->gender)
            @switch ($user->gender)
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
          @else
           <p>No gender data</p>
          @endif
        @endif
        </li>
        <li>
        @if (($board->user->id !== Auth::id()))
          {{ $board->user->prefecture->name }}
        @else
          {{ $user->prefecture->name }}
        @endif
        </li>
      </ul>
    </div>
    <div class="pet">
      <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="Pet thumbnail">
      <ul>
        <li>Pet Information</li>
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

  <!-- Message area -->
  <div class="message-area">
    <div class="messages js-scroll-down">
    @if ($messages)
      @foreach ($messages as $message)
        @if ($message->send_user_id === Auth::id())
          <div class="message send">
            <p class="message-body send">{!! nl2br($message->body) !!}</p>
            @if ($message->user->thumbnail)
            <img src="/storage/user_thumbnails/{{ $message->user->thumbnail }}" alt="User thumbnail" class="message-img send">
            @else
            <img src="{{ asset('img/noimage.png') }}" alt="User thumbnail" class="message-img send">
            @endif
          </div>
          <p class="message-date send">{{ $message->created_at }}</p>
        @else
          <div class="message">
            @if ($message->user->thumbnail)
              <img src="/storage/user_thumbnails/{{ $message->user->thumbnail }}" alt="User thumbnail" class="message-img recieve">
            @else
              <img src="{{ asset('img/noimage.png') }}" alt="User thumbnail" class="message-img recieve">
            @endif
            <p class="message-body">{!! nl2br($message->body) !!}</p>
          </div>
          <p class="message-date">{{ $message->created_at }}</p>
        @endif
      @endforeach
    @else
      <p class="nomessage">まだメッセージはありません</p>
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
  <div class="link">
    <a href="{{ route('top.detail', ['id' => $board->pet_id]) }}"><i class="fas fa-chevron-left"></i> Back to Pet Detail</a>
  </div>
</div>
@endsection
