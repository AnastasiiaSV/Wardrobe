<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Config;
use Illuminate\Support\Facades\Cookie;
class HomeController extends Controller
{
    //
    public  function index(){
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        return view('main_page');
    }

}
