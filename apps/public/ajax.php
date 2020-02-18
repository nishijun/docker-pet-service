<?php
use \App\Favorite;
use Illuminate\Support\Facades\Auth;

$newFavorite = new Favorite([
  'user_id' => Auth::id(),
  'pet_id' => 1
]);
$newFavorite->save();

// $favorite = Favorite::where('user_id', Auth::id())->where('pet_id', $_POST['pet_id'])->first();
//
// if (!$favorite) {
//   $newFavorite = new Favorite([
//     'user_id' => Auth::id(),
//     'pet_id' => $_POST['pet_id']
//   ]);
//   $newFavorite->save();
// } else {
//   $favorite->forceDelete();
// }
