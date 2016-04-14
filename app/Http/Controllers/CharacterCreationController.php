<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CharacterCreationController extends Controller
{
   public function index()
    {
        return view('character_creation');
    }
}
