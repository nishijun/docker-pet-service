<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Prefecture;
use App\AnimalCategory;

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
        return view('index');
    }

    public function top() {
      $prefectures = Prefecture::all();
      $pets = Pet::all();
      return view('top', compact('pets', 'prefectures'));
    }

    public function search() {

    }

    public function detail($id) {
      $pet = Pet::findOrFail($id);

      return view('detail', compact('pet'));
    }
}
