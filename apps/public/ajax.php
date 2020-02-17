<?php
use \App\Favorite;
use Illuminate\Http\Request;

function ajax(Request $request) {
  $favorite = Favorite::where('user_id', Auth::id())->where('pet_id', $request->pet_id)->first();

  if (!$favorite) {
    $newFavorite = new Favorite([
      'user_id' => Auth::id(),
      'pet_id' => $request->pet_id
    ]);
    $newFavorite->save();
  } else {
    $favorite->forceDelete();
  }
}

ajax();
