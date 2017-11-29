<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

use Wardrobe\Models\Type;
use Wardrobe\Models\Item;
use Wardrobe\Models\User;
use Wardrobe\Models\City;
use Wardrobe\Models\Wardrobe;
class AccountController extends Controller
{
    public  function index(){
        //todo
        //передавать сюда id вошедшего пользователя
        //и открывать его страницу

        return view('account');
    }

    public  function showWardrobes(){

        $found_item = Wardrobe::find(1);

        var_dump($found_item);

        return view('account');
    }

    public  function gotoWardrobe(){
        /**
         * todo
         */
        $wardrobe_id = 1;
        $wardrobe = Wardrobe::find($wardrobe_id);

        return view('wardrobe',['wardrobe' => $wardrobe]);
    }

}
