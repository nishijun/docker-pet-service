@extends('layouts.mypage')
@section('title', 'Register Pet')
@section('content')
<form class="form" action="{{ route('mypage.createPet') }}" method="post" enctype="multipart/form-data">
  @csrf
  <h1 class="section-title">Register Pet</h1>
  <div class="title-line"></div>

  <!-- Name -->
  <label for="name" class="form-label">Name</label><span class="form-required">Required</span>
  <input id='name' type="text" name="name" value="{{ old('name') }}" class="form-input">
  @error('name')
    <p>{{ $message }}</p>
  @enderror

  <!-- Age -->
  <label for="age" class="form-label">Age</label><span class="form-required">Required</span><br>
  <div class="cp_ipselect cp_sl04">
    <select id="age" name="age" class="form-select">
      <option value="">Please Choose Below</option>
      @for ($i = 0; $i <= 30; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>
  </div>

  <!-- Gender -->
  <label for="gender" class="form-label">Gender</label><span class="form-required">Required</span><br>
  <input type="radio" name="gender" value="1" class="form-radio">Male
  <input type="radio" name="gender" value="2" class="form-radio">Female
  <input type="radio" name="gender" value="3" class="form-radio">Other<br>

  <!-- Animal Category -->
  <label for="animal_category_id" class="form-label">Kind of Animal</label><span class="form-required">Required</span><br>
  @foreach ($animalCategories as $animalCategory)
  <input type="radio" name="animal_category_id" value="{{ $count }}" class="form-radio">{{ $animalCategory->name }}
  @if ($count === 3)
    <br class="responsive">
  @endif
  <?php $count++ ?>
  @endforeach

  <!-- Price -->
  <br><label for="price" class="form-label">Price</label><span class="form-required">Required</span>
  <input id="price" type="number" name="price" value="{{ old('price') }}" class="form-input" required>
  @error('price')
    <p>{{ $message }}</p>
  @enderror

  <!-- Body -->
  <label for="body" class="form-label">Detail</label><span class="form-required">Required</span>
  <textarea id="body" name="body" class="form-textarea" required>{{ old('body') }}</textarea>
  @error('body')
    <p>{{ $message }}</p>
  @enderror

  <!-- Thumbnail -->
  <label class="form-label">Pictures</label><span class="form-required">Required</span>
  <div class="form-images">
    <!-- Pic1 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic1" value="{{ old('pic1') }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" style="display:none;">
      Picture1 Required
    </div>
    <!-- Pic2 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic2" value="{{ old('pic2') }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" style="display:none;">
      Picture2
    </div>
    <!-- Pic3 -->
    <div class="form-image js-image-area">
      <input type="file" name="pic3" value="{{ old('pic3') }}" class="form-image-file js-image">
      <img class="prev-img" alt="Pet thumbnail" style="display:none;">
      Picture3
    </div>
  </div>
  @error ('pic1')
   <p>{{ $message }}</p>
  @enderror

  <!-- Submit -->
  <input type="submit" value="Register" class="form-submit">
</form>
@endsection
