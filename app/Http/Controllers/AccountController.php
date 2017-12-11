<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Wardrobe\Models\Item_Outfit;
use Wardrobe\Models\Outfit;
use Wardrobe\Models\Type;
use Wardrobe\Models\Item;
use Wardrobe\Models\User;
use Wardrobe\Models\City;
use Wardrobe\Models\Wardrobe;
class AccountController extends Controller
{
    public  function index(){
        //передавать сюда id вошедшего пользователя
        //и открывать его страницу
        //id находится в куке

        $user_id = Cookie::get('UserId');

        if (isset($user_id)) {
            return view('account', ['user_id' => $user_id]);
        }
        else{
            return view('login');
        }
    }

    public static function getUserWardrobesList($user_id){
        $found_item = Wardrobe::where('creator_id',$user_id)->get();
       // var_dump($found_item);
        return $found_item;
    }

    public  function gotoWardrobe($wardrobe_id){
        $wardrobe = Wardrobe::find($wardrobe_id);
        return view('wardrobe',['wardrobe' => $wardrobe]);
    }

    public static function getUserOutfits($user_id){
        $found_item = Outfit::where('creator_id',$user_id)->get();
        // var_dump($found_item);
        return $found_item;
    }

    public static function getOutfitItems($outfit_id){
        //items_outfits
        $found_item = Item_Outfit::where('outfit_id',$outfit_id)->get();
        // var_dump($found_item);
        return $found_item;
    }
}
