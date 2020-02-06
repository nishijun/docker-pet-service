<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Prefecture;
use Carbon\Carbon;
use Session;

class MypageController extends Controller
{
    public function index() {
      return view('mypage.index');
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
        'email' => 'required | string | email | max:255 | unique:users',
        'thumbnail' => 'required | file | image | mimes:jpeg,png,jpg,gif | max:2048'
      ]);

      // ユーザ画像をストレージへ保存
      $user_thumbnail_path = Carbon::now().'_'.Auth::id().'.jpg';
      $request->thumbnail->storeAs('public/user_thumbnails', $user_thumbnail_path);

      // データ更新
      $user = User::findOrFail(Auth::id());
      $user->fill($request->all());
      $user->thumbnail = $user_thumbnail_path;
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
}
