<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postcard;

class RoutesController extends Controller
{
    /**
     * Sends you to the welcome page
     *
     */
    
    public function welcome(){

        $entries = Postcard::all();

        return view('welcome', compact('entries'));

    }
}
