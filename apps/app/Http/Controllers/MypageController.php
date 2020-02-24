<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pet;
use App\Prefecture;
use App\AnimalCategory;
use App\Board;
use App\Favorite;
use Carbon\Carbon;
use Session;
use App\Http\Requests\CreatePetRequest;

class MypageController extends Controller
{
    public function index() {
      $pets = Pet::where('user_id', Auth::id())->get();
      if ($pets->isEmpty()) {
        $pets = false;
      }

      $boards_sell = Board::where('sell_user_id', Auth::id())->get();
      if ($boards_sell->isEmpty()) {
        $boards_sell = false;
      }

      $boards_buy = Board::where('buy_user_id', Auth::id())->get();
      if ($boards_buy->isEmpty()) {
        $boards_buy = false;
      }

      $favorites = Favorite::where('user_id', Auth::id())->get();
      if ($favorites->isEmpty()) {
        $favorites = false;
      }

      return view('mypage.index', compact('pets', 'boards_sell', 'boards_buy', 'favorites'));
    }

    public function unsubscribe() {
      return view('mypage.unsubscribe');
    }

    public function withdraw(Request $request) {
      $user = User::find(Auth::id());
      $user->delete();

      return redirect('/');
    }

    public function editProfile() {
      $prefectures = Prefecture::all();
      $user = User::find(Auth::id());
      return view('mypage.editProfile', compact('user', 'prefectures'));
    }

    public function updateUser(Request $request) {
      $request->validate([
        'name' => 'required | string | max:255',
        'email' => 'required | string | email | max:255',
        'thumbnail' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048'
      ]);

      // データ更新
      $user = User::findOrFail(Auth::id());
      $user->fill($request->all());

      // ユーザ画像をストレージへ保存
      if ($request->thumbnail) {
        $user_thumbnail_path = Carbon::now().'_'.Auth::id().'.jpg';
        $request->thumbnail->storeAs('public/user_thumbnails', $user_thumbnail_path);
        $user->thumbnail = $user_thumbnail_path;
      } else {
        $user->thumbnail = $user->thumbnail;
      }
      $user->save();

      return redirect('/mypage');
    }

    public function changePassword() {
      $token = 0;
      return view('mypage.changePassword', compact('token'));
    }

    public function updatePassword(Request $request) {
      // 条件分岐
      switch ($request->token) {
        case 0:
          $request->validate([
            'password' => 'required | string | min:8'
          ]);
          $user = User::findOrFail(Auth::id());

          if (!Hash::check($request->password, $user->password)) {
            $token = 0;
            Session::flash('error', 'Invalid password!');
            return view('mypage.changePassword', compact('token'));
          }
          $token = 1;
          return view('mypage.changePassword', compact('token'));
          break;

        case 1:
          $request->validate([
            'password' => 'required | string | min:8'
          ]);
          if ($request->password !== $request->password_re) {
            $token = 1;
            Session::flash('error', 'Password has not accorded!');
            return view('mypage.changePassword', compact('token'));
          }
          $user = User::findOrFail(Auth::id());
          $user->password = Hash::make($request->password);
          $user->save();

          return redirect('/mypage');
      }
    }

    public function registerPet() {
      $animalCategories = AnimalCategory::all();
      $count = 1;

      return view('mypage.registerPet', compact('animalCategories', 'count'));
    }

    public function editPet1($id) {
      $animalCategories = AnimalCategory::all();
      $count = 1;
      $pet = Pet::find($id);

      return view('mypage.editPet', compact('animalCategories', 'count', 'pet'));
    }

    public function editPet2(Request $request, $id) {
      $request->validate([
        'name' => 'required | string | max:255',
        'age' => 'required',
        'gender' => 'required',
        'animal_category_id' => 'required',
        'price' => 'required | numeric',
        'body' => 'required',
        'pic1' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048',
        'pic2' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048',
        'pic3' => 'file | image | mimes:jpeg,png,jpg,gif | max:2048'
      ]);

      $pet = Pet::findOrFail($id);
      $pet->fill($request->all());

      if ($request->pic1) {
        $pet_pic1_path = Carbon::now().'_1_'.Auth::id().'.jpg';
        $request->pic1->storeAs('public/pet_thumbnails', $pet_pic1_path);
        $pet->pic1 = $pet_pic1_path;
      } else {
        $pet->pic1 = $pet->pic1;
      }
      if ($request->pic2) {
        $pet_pic2_path = Carbon::now().'_2_'.Auth::id().'.jpg';
        $request->pic2->storeAs('public/pet_thumbnails', $pet_pic2_path);
        $pet->pic2 = $pet_pic2_path;
      } else {
        $pet->pic2 = $pet->pic2;
      }
      if ($request->pic3) {
        $pet_pic3_path = Carbon::now().'_3_'.Auth::id().'.jpg';
        $request->pic3->storeAs('public/pet_thumbnails', $pet_pic3_path);
        $pet->pic3 = $pet_pic3_path;
      } else {
        $pet->pic3 = $pet->pic3;
      }
      $pet->save();

      return redirect(route('mypage'));
    }

    public function createPet(CreatePetRequest $request) {
      $pet_pic1_path = Carbon::now().'_1_'.Auth::id().'.jpg';
      $request->pic1->storeAs('public/pet_thumbnails', $pet_pic1_path);

      $pet = Pet::findOrFail();
      $pet->fill($request->all());
      $pet->pic1 = $pet_pic1_path;
      if ($request->pic2) {
        $pet_pic2_path = Carbon::now().'_2_'.Auth::id().'.jpg';
        $request->pic2->storeAs('public/pet_thumbnails', $pet_pic2_path);
        $pet->pic2 = $pet_pic2_path;
      }
      if ($request->pic3) {
        $pet_pic3_path = Carbon::now().'_3_'.Auth::id().'.jpg';
        $request->pic3->storeAs('public/pet_thumbnails', $pet_pic3_path);
        $pet->pic3 = $pet_pic3_path;
      }
      $pet->user_id = Auth::id();
      $pet->save();

      return redirect(route('mypage'));
    }
}
