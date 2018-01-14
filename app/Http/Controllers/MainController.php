<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Cookie;

use Wardrobe\Models\Item;
use Wardrobe\Models\Season;
use Wardrobe\Models\Category;
use Wardrobe\Models\Wardrobe;
use Wardrobe\Models\Type;
use Wardrobe\Models\Country;
use Wardrobe\Models\City;
use Wardrobe\Models\Place;
use Wardrobe\Models\Outfit;
class MainController extends Controller
{
    public  function index(){
        return response(view('main_page'))
            ->cookie('Lang', 'en', 60);
    }

    public  function gotoPostsPage(Request $request){
        return view('posts');
    }

    public static function getCategoriesList(){
       // $categories_arr = Category::all();
        $categories_arr = Category:: pluck('name', 'id')->all();
        return $categories_arr ;
    }

    public static function getCategories(){
         $categories_arr = Category::all();
        return $categories_arr ;
    }

    public static function getAllTypesList(){
        $types_arr = Type:: pluck('name', 'id')->all();
        return $types_arr ;
    }

    public static function getAllTypes(){
        $types_arr = Type::all();
        return $types_arr ;
    }


    public static function getLatestItems(){
        $items = Item::orderBy('time_of_creation', 'DESC')
                        ->take(18)
                        ->get();
        return $items ;
    }

    public static function getCategoryTypes($category_id){
        // $types_arr = Type::all();
        $types_arr = Type::where('category_id',$category_id)->get();
        // $types_arr = [''=>''] + Type:: pluck('name', 'id', 'category_id')->all();
        return $types_arr ;
    }

    public static function getCategoryTypesList($category_id){
        // $types_arr = Type::all();
        $types_arr = Type::where('category_id',$category_id)->pluck('name','id');
        // $types_arr = [''=>''] + Type:: pluck('name', 'id', 'category_id')->all();
        return $types_arr ;
    }

    public static function getSeasonsList(){
        $seasons_arr = Season:: pluck('name', 'id')->all();
        return $seasons_arr ;
    }

    public static function getCountriesList(){
        $countries_arr = Country:: pluck('name', 'id')->all();
        return $countries_arr ;
    }

    public static function getCitiesOfCountryList($country_id){
        // $types_arr = Type::all();
        $cities_arr = City::where('country_id',$country_id)->pluck('name','id');
        return $cities_arr ;
    }

    public static function getPlacesList(){
        $places_arr = Place:: pluck('name', 'id')->all();
        return $places_arr ;
    }


    public static function getUserPlacesList(){
        $places_arr = Place:: pluck('name', 'id')->all();
        return $places_arr ;
    }

    public static function getOneItemById($item_id){
        $item = Item::find($item_id);
        return $item ;
    }

    public static function getOneElementByIdAndName($table_name, $element_id){
        if($table_name=="Item"){
            $element = Item::find($element_id);
        }
        else if($table_name=="Outfit"){
            $element = Outfit::find($element_id);
        }
        else if($table_name=="Wardrobe"){
            $element = Wardrobe::find($element_id);
        }
        else if($table_name=="Place"){
            $element = Place::find($element_id);
        }
        else if($table_name=="Season"){
            $element = Season::find($element_id);
        }
        else if($table_name=="Category"){
            $element = Category::find($element_id);
        }
        return $element ;
    }

}
