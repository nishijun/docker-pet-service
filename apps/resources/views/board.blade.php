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
</div>
@endsection
