@extends('layouts.mypage')
@section('title', 'Unsubscribe')
@section('content')
<form class="form" action="{{ route('mypage.withdraw') }}" method="post">
  @csrf
  <h1 class="section-title">Unsubscribe</h1>
  <div class="title-line"></div>
  <input type="submit" value="Unsubscribe" class="form-submit">
</form>
@endsection
