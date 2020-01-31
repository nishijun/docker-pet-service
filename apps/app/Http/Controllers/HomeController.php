<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\User;

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
    public function index()
    {
        $prefectures = Prefecture::all();
        return view('index', compact('prefectures'));
    }

    public function auth(Request $request) {

        $request->validate([
          'name' => 'required',
          'email' => 'email | required',
          'password' => 'required | min:4',
          'prefecture_id' => 'required',
        ]);
        $user = new User([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'prefecture_id' => $request->prefecture_id,
        ]);
        $user->save();
        return redirect('/');
    }
}
