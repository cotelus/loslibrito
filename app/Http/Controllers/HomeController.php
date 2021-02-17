<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Muestra la ruta Home sin mas
    public function getHome(){
        return view('home');
    }

}
