<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Config;

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
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

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


    public function editAccountInfo(Request $request)
    {
        $email = $request->input('email');
        $old_psw = $request->input('old_password');
        $new_psw = $request->input('new_password');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $phone = $request->input('phone');
        $birth = $request->input('birth');
        $country_id = $request->input('country_id');
        $city_id = $request->input('city_id');

        //if user exists
        $user = User::where('email', $email)->first();
        if (isset($user)) {
            $user_id = $user->id;

            if(isset($old_psw) && isset($new_psw)){
                if($old_psw == $user->password){
                    $user = User::where('id', $user_id)
                        ->update([
                            'password' => $new_psw,
                        ]);
                }
            }

            if(isset($name)){
                $user = User::where('id', $user_id)
                    ->update([
                        'name' => $name
                    ]);
            }
            if(isset($surname)){
                $user = User::where('id', $user_id)
                    ->update([
                        'surname' => $surname,
                    ]);
            }
            if(isset($phone)){
                $user = User::where('id', $user_id)
                    ->update([
                        'phone' => $phone,
                    ]);
            }
            if(isset($birth)){
                $user = User::where('id', $user_id)
                    ->update([
                        'date_of_birth' => $birth,
                    ]);
            }
            if(isset($country_id)){
                $user = User::where('id', $user_id)
                    ->update([
                        'country_id' => $country_id,
                    ]);
            }

            //check city to country matching
            $isRightType = false;
            if(isset($country_id) && isset($city_id)){
                $city = City::find($city_id);
                if($city->country_id == $country_id) $isRightType = true;
            }
            if(isset($city_id) && $isRightType){
                $user = User::where('id', $user_id)
                    ->update([
                        'city_id' => $city_id,
                    ]);
            }

            //язык
            $conf_locale = Config::get('app.locale');
            $locale = Cookie::get('Lang', $conf_locale);
            App::setLocale($locale);

            $user = User::find($user_id);
            return view('account', ['user_id' => $user->id]);

        } else {
            return view('login');
        }
    }

}
