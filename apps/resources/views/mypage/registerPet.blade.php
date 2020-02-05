@extends('layouts.mypage')
@section('title', 'Register Pet')
@section('content')
<h1>Register Pet</h1>
<form  action="{{ route('mypage.createPet') }}" method="post" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label>
  <input id='name' type="text" name="name" value="{{ old('name') }}">
  @error('name')
    <p>{{ $message }}</p>
  @enderror
  <label for="age">Age</label>
  <select id="age" name="age">
    <option value="">Please Choose Below</option>
    @for ($i = 0; $i <= 30; $i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
  <label for="">Gender</label>
  <input type="radio" name="gender" value="1">Male
  <input type="radio" name="gender" value="2">Female
  <input type="radio" name="gender" value="3">Other
  <label for="animal_category_id">Kind of Animal</label>
  @foreach ($animalCategories as $animalCategory)
  <input type="radio" name="animal_category_id" value="{{ $count }}">{{ $animalCategory->name }}
  <?php $count++ ?>
  @endforeach
  <label for="price">Price</label>
  <input id="price" type="number" name="price" value="{{ old('price') }}">
  @error('price')
    <p>{{ $message }}</p>
  @enderror
  <label for="body">Detail</label>
  <textarea id="body" name="body">{{ old('body') }}</textarea>
  @error('body')
    <p>{{ $message }}</p>
  @enderror
  <label for="pic1">Thumbnail 1</label>
  <input id="pic1" type="file" name="pic1">
  @error ('pic1')
   <p>{{ $message }}</p>
  @enderror
  <label for="pic2">Thumbnail 2</label>
  <input id="pic2" type="file" name="pic2">
  <label for="pic3">Thumbnail 3</label>
  <input id="pic3" type="file" name="pic3">
  <input type="submit" value="Register">
</form>
@endsection
