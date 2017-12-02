<?php

namespace Wardrobe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Wardrobe\Models\Season;
use Wardrobe\Models\Category;
use Wardrobe\Models\Type;
class MainController extends Controller
{
    public  function index(){
        return view('main_page');
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

}
