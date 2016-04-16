<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

class CharacterCreationController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('character_creation');
    }
}
