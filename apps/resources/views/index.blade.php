@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="hero">
  <div class="hero-cover">
    <h1 class="hero-title">PetService</h1>
    <p class="hero-text"></p>
    <button class="hero-toTop"><a href="{{ route('top') }}">See pets</a></button>
  </div>
</div>
@endsection
