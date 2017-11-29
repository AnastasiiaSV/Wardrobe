<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function index(){

        return view('main_page');
    }

}
