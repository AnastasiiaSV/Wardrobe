<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public  function index(){

        return view('login');
    }
}
