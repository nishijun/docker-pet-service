<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Pet;
use App\Prefecture;
use App\AnimalCategory;
use App\Board;
use App\Message;
use App\Favorite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
      if (Auth::check()) {
        return redirect(route('top'));
      }
      return view('index');
    }

    public function top() {
      $prefecture_id = '';
      $animal_category_id = '';
      $prefectures = Prefecture::all();
      $pets = Pet::all();
      $hit_count = Pet::all()->count();
      $animalCategories = AnimalCategory::all();
      return view('top', compact('pets', 'prefectures', 'animalCategories', 'prefecture_id', 'animal_category_id', 'hit_count'));
    }

    public function search(Request $request) {
      $prefecture_id = $request->prefecture_id;
      $animal_category_id = $request->animal_category_id;

      if ($prefecture_id || $animal_category_id) {
        $query = Pet::query();
        if ($prefecture_id) {
          $query->whereHas('user', function($q) use($prefecture_id) {
            $q->where('prefecture_id', $prefecture_id);
          });
        }
        if ($animal_category_id) {
          $query->where('animal_category_id', $animal_category_id);
        }
        $pets = $query->get();
        $hit_count = $query->get()->count();
      } else {
        $pets = Pet::all();
        $hit_count = Pet::all()->count();
      }

      $prefectures = Prefecture::all();
      $animalCategories = AnimalCategory::all();

      return view('top', compact('pets', 'prefectures', 'animalCategories', 'prefecture_id', 'animal_category_id', 'hit_count'));
    }

    public function detail($id) {
      $pet = Pet::findOrFail($id);
      $favorite = Favorite::where('pet_id', $id)->where('user_id', Auth::id())->first();
      return view('detail', compact('pet', 'favorite'));
    }

    public function board1(Request $request, $id) {
      $board = Board::where('buy_user_id', Auth::id())->where('pet_id', $id)->first();
      if ($board) {
        return redirect(route('board2', ['id' => $board->pet_id, 'bId' => $board->id]));
      }

      $newBoard = new Board([
        'buy_user_id' => Auth::id(),
        'sell_user_id' => $request->sell_user_id,
        'pet_id' => $id
      ]);
      $newBoard->save();
      $board = Board::where('buy_user_id', Auth::id())->where('pet_id', $id)->first();

      return redirect(route('board2', ['id' => $board->pet_id, 'bId' => $board->id]));
    }

    public function board2($id, $bId) {
      $pet = Pet::find($id);
      $board = Board::find($bId);
      if (!$board) {
        return redirect(route('top.detail', ['id' => $pet->id]));
      }
      if ($board->buy_user_id !== Auth::id()) {
        return redirect(route('top.detail', ['id' => $pet->id]));
      }
      $messages = Message::where('board_id', $bId)->get();

      return view('board', compact('board', 'pet', 'messages'));
    }

    public function message(Request $request, $id, $bId) {
      $request->validate([
        'body' => 'required'
      ]);
      $board = Board::find($bId);
      $pet = Pet::find($id);
      $message = new Message([
        'board_id' => $bId,
        'send_user_id' => Auth::id(),
        'recieve_user_id' => $pet->user_id,
        'send_date' => Carbon::now(),
        'body' => $request->body
      ]);
      $message->save();
      $messages = Message::where('board_id', $bId)->get();
      return view('board', compact('board', 'pet', 'messages'));
    }

    public function favorite() {
      $favorite = Favorite::where('pet_id', $_POST['pet_id'])->where('user_id', Auth::id())->first();
      if ($favorite) {
        $favorite->forceDelete();
      } else {
        $newFavorite = new Favorite([
          'user_id' => Auth::id(),
          'pet_id' => $_POST['pet_id']
        ]);
        $newFavorite->save();
      }
    }
}
