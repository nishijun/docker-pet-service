@extends('layouts.app')
@section('title', 'Board')
@section('content')
<div class="board-top">
  <div class="sell_user">
    @if ($board->user->thumbnail)
    <img src="/storage/user_thumbnails/{{ $board->user->thumbnail }}" alt="">
    @else
    <img src="{{ asset('img/noimage.png') }}" alt="">
    @endif
    <p>{{ $board->user->name }}</p>
    <p>
      <span>{{ $board->user->gender}}</span>
      <span>{{ $board->user->age }}</span>
    </p>
    <p>{{ $board->user->prefecture->name }}</p>
  </div>
  <div class="pet">
    <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="">
    <p>{{ $pet->name }}</p>
    <p>{{ $pet->age }}</p>
    <p>{{ $pet->gender }}</p>
    <p>{{ $pet->animalCategory->name }}</p>
    <p>{{ $pet->price }}</p>
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
