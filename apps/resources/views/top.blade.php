@extends('layouts/app')
@section('title', 'Top')
@section('content')
<div class="container-original">

  <!-- Search warpper -->
  <div class="search-wrapper">
    <form action="{{ route('top.search') }}" method="post" class="form">
      @csrf
      <h1 class="section-title">{{ __('Search') }}</h1>
      <div class="title-line"></div>

      <!-- Prefecture -->
      <label for="prefecture_id" class="form-label">Prefecture</label>
      <div class="cp_ipselect cp_sl04">
        <select id="prefecture_id" name="prefecture_id" class="form-select">
          <option value="">Choose Below</option>
          @foreach ($prefectures as $prefecture)
          <option value="{{ $prefecture->id }}" @if ($prefecture->id == $prefecture_id) selected @endif>{{ $prefecture->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Animal Category -->
      <label for="animal_category_id" class="form-label">Animal Species</label>
      <div class="cp_ipselect cp_sl04">
        <select id="animal_category_id" name="animal_category_id" class="form-select">
          <option value="">Choose Below</option>
          @foreach ($animalCategories as $animalCategory)
          <option value="{{ $animalCategory->id }}" @if ($animalCategory->id == $animal_category_id) selected @endif>{{ $animalCategory->name }}</option>
          @endforeach
        </select>
      </div>

      <!-- Submit -->
      <input type="submit" value="Search" class="form-submit">
    </form>
  </div>

  <!-- Main wrapper -->
  <div class="main-wrapper">
    <p class="search-info"><span class="hit-count">{{ $hit_count }}</span> Hit</p>
    <div class="pets">
    @if ($pets)
      @foreach ($pets as $pet)
        <div class="pet">
          <a href="{{ route('top.detail', ['id' => $pet->id]) }}" class="pet-link">
            <img src="/storage/pet_thumbnails/{{ $pet->pic1 }}" alt="Pet thumbnail" class="pet-img">
            <h2 class="pet-name">{{ $pet->name }}<span class="pet-age"> ({{ $pet->age }})</span></h2>
            <p class="pet-info">
              <span class="pet-category">{{ $pet->animalCategory->name }}</span>
              <span class="pet-gender">
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
              </span>
            </p>
            <p class="pet-prefecture">{{ $pet->user->prefecture->name }}</p>
          </a>
        </div>
      @endforeach
    @else
      <p class="no-search-data">No data</p>
    @endif
    </div>
  </div>
</div>
@endsection
