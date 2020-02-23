@extends('layouts.app')
@section('title', 'Owner')
<div class="container-detail owner-page">
  <div class="owner-img">
  @if ($pet->user->thumbnail)
    <img src="/storage/user_thumbnails/{{ $pet->user->thumbnail }}" alt="User thumbnail">
  @else
    <img src="{{ asset('img/noimage.png') }}" alt="No image">
  @endif
  </div>
  <div class="owner-detail">
    <table>
      <tr><th>Name</th><td>{{ $pet->user->name }}</td></tr>
      <tr>
        <th>Gender</th>
        <td>
          @switch ($pet->user->gender)
          @case (1)
          <i class="fas fa-mars"></i>
          @break
          @case (2)
          <i class="fas fa-venus"></i>
          @break
          @case (3)
          <i class="fas fa-mars-stroke-h"></i>
          @break
          @default
          No data
          @break
          @endswitch
        </td>
      </tr>
      <tr>
        <th>Age</th>
        <td>
          @if ($pet->user->age)
          {{ $pet->user->age }}
          @else
          No data
          @endif
        </td>
      </tr>
      <tr><th>Area</th><td>{{ $pet->user->prefecture->name }}</td></tr>
    </table>
    <a href="{{ route('top.detail', ['id' => $pet->id]) }}"><i class="fas fa-chevron-left"></i> Back to Pet Detail</a>
  </div>
</div>
@section('content')
@endsection
