<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Prefecture;

class PetController extends Controller
{
    public function index() {
      $prefectures = Prefecture::all();
      $pets = Pet::all();
      return view('top', compact('pets', 'prefectures'));
    }

    public function search() {

    }
}
