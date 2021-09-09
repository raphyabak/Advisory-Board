<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        session()->forget('adviser');
        return view('welcome');
    }
}
