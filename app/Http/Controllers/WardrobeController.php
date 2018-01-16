<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;

use Wardrobe\Models\Item;
use Wardrobe\Models\Wardrobe;
use Wardrobe\Models\Wardrobe_Item;
class WardrobeController extends Controller
{
    public  function index(){
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        return view('wardrobe');
    }

    public  function gotoNewItemPage(Request $request){
        //получить и найти гардероб для использования на странице создания образа
        $wardrobe_id = $request->input('wardrobe_id');
        $found_wardrobe = Wardrobe::find($wardrobe_id);

        $creator_id = $request->input('creator_id');

        return view('new_item', ['vars' =>  [$found_wardrobe, $creator_id]]);
    }

    public  function gotoNewOutfitPage(Request $request){
        //получить и найти гардероб для использования на странице создания образа
        $wardrobe_id = $request->input('wardrobe_id');
       // $found_wardrobe = Wardrobe::find($wardrobe_id);

        $creator_id = $request->input('creator_id');

        return view('new_outfit', ['vars' =>  [$wardrobe_id, $creator_id]]);
    }

    public  function gotoNewWardrobePage(Request $request){

        $creator_id = $request->input('creator_id');
        return view('new_wardrobe', ['vars' =>  [$creator_id]]);
    }

    public static function wardrobeCategoryItems($wardrobe_id, $category_id){
        if (isset($wardrobe_id)){
            $wardrobe_items_ids = Wardrobe_Item::where('wardrobe_id','=',$wardrobe_id )->get();

            $items_arr = Item::where('items.category_id', '=', $category_id)
                ->join('wardrobes_items', 'items.id', '=','wardrobes_items.item_id')
                ->where('wardrobes_items.wardrobe_id', '=', $wardrobe_id)
                ->select('items.*')
                ->get();
        }else{
            $items_arr = "";
        }

       // var_dump($items_arr);
        return $items_arr ;
    }


    public function createWardrobe(Request $request)
    {
        $name = $request->input('name');
        $creator_id = $request->input('creator_id');

        $wardrobe = Wardrobe::create([
            'name' => $name,
            'creator_id' =>$creator_id,
        ]);

        return redirect("/wardrobe/$wardrobe->id");
       // return view('wardrobe',['wardrobe' => $wardrobe]);
    }
}
