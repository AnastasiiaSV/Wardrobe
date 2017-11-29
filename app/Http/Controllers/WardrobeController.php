<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;

use Wardrobe\Models\Item;
use Wardrobe\Models\Wardrobe;
use Wardrobe\Models\Wardrobe_Item;
class WardrobeController extends Controller
{
    public  function index(){
        return view('wardrobe');
    }

    public  function gotoNewItemPage(Request $request){
        /**
         * todo creator_id
         */
        return view('new_item',['creator_id' => 1]);
    }

    public  function gotoOutfitPage(Request $request){
        //получить и найти гардероб для использования на странице создания образа
        $wardrobe_id = $request->input('wardrobe_id');
        $found_wardrobe = Wardrobe::find($wardrobe_id);

        /**
         * todo creator_id
         */
        $creator_id=1;

        return view('outfit', ['vars' =>  [$found_wardrobe, $creator_id]]);
    }

    public static function wardrobeTypeItems($wardrobe, $category_id){
        if (isset($wardrobe)){
            $wardrobe_items_ids = Wardrobe_Item::where('wardrobe_id','=', $wardrobe->id )->get();

            $items_arr = Item::where('items.category_id', '=', $category_id)
                ->join('wardrobes_items', 'items.id', '=','wardrobes_items.item_id')
                ->where('wardrobes_items.wardrobe_id', '=', $wardrobe->id)
                ->get();
        }else{
            $items_arr = "";
        }

        //var_dump($items_arr);
        return $items_arr ;
    }
}
