@extends('layouts.mypage')
@section('title', 'Unsubscribe')
@section('content')
<h1>Unsubscribe</h1>
<form action="{{ route('mypage.withdraw') }}" method="post">
  @csrf
  <input type="submit" value="Unsubscribe">
</form>
@endsection
