@extends('layouts.mypage')
@section('title', 'Edit Pet')
@section('content')
<form class="form" action="{{ route('mypage.editPet2',['id' => $pet->id]) }}" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="section-title">Edit Pet</h1>
  <div class="title-line"></div>

  <!-- Name -->
  <label for="name" class="form-label">Name</label><span class="form-required">Required</span>
  <input id='name' type="text" name="name" value="{{ $pet->name }}" class="form-input" required>
  @error('name')
    <p>{{ $message }}</p>
  @enderror

  <!-- Age -->
  <label for="age" class="form-label">Age</label><span class="form-required">Required</span><br>
  <div class="cp_ipselect cp_sl04">
    <select id="age" name="age" class="form-select">
      @for ($i = 0; $i <= 30; $i++)
      <option value="{{ $i }}" @if ($pet->age === $i) selected @endif>{{ $i }}</option>
      @endfor
    </select>
  </div>

  <!-- Gender -->
  <label for="gender" class="form-label">Gender</label><span class="form-required">Required</span><br>
  <input type="radio" name="gender" value="1" class="form-radio" @if ($pet->gender === 1) checked @endif>Male
  <input type="radio" name="gender" value="2" class="form-radio" @if ($pet->gender === 2) checked @endif>Female
  <input type="radio" name="gender" value="3" class="form-radio" @if ($pet->gender === 3) checked @endif>Other<br>

  <!-- Animal Category -->
  <label for="animal_category_id" class="form-label">Kind of Animal</label><span class="form-required">Required</span><br>
  @foreach ($animalCategories as $animalCategory)
  <input type="radio" name="animal_category_id" value="{{ $count }}" class="form-radio" @if ($pet->animal_category_id === $count) checked @endif>{{ $animalCategory->name }}
  @if ($count === 3)
    <br class="responsive">
  @endif
  <?php $count++ ?>
  @endforeach

  <!-- Price -->
  <br><label for="price" class="form-label">Price</label><span class="form-required">Required</span>
  <input id="price" type="number" name="price" value="{{ $pet->price }}" class="form-input" required>
  @error('price')
    <p>{{ $message }}</p>
  @enderror

  <!-- Body -->
  <label for="body" class="form-label">Detail</label><span class="form-required">Required</span>
  <textarea id="body" name="body" class="form-textarea" required>{{ $pet->body }}</textarea>
  @error('body')
    <p>{{ $message }}</p>
  @enderror

  <!-- Thumbnail -->
  <label class="form-label">Pictures</label><span class="form-required">Required</span>
  <div class="form-images">
    <!-- Pic1 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic1" value="{{ $pet->pic1 }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" @if ($pet->pic1) src="/storage/pet_thumbnails/{{ $pet->pic1 }}" @else style="display:none;" @endif>
      Picture1 Required
    </div>
    <!-- Pic2 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic2" value="{{ $pet->pic2 }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" @if ($pet->pic2) src="/storage/pet_thumbnails/{{ $pet->pic2 }}" @else style="display:none;" @endif>
      Picture2
    </div>
    <!-- Pic3 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic3" value="{{ $pet->pic3 }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" @if ($pet->pic3) src="/storage/pet_thumbnails/{{ $pet->pic3 }}" @else style="display:none;" @endif>
      Picture3
    </div>
  </div>
  @error ('pic1')
    <p>{{ $message }}</p>
  @enderror

  <!-- Submit -->
  <input type="submit" value="Edit" class="form-submit">
</form>
@endsection
