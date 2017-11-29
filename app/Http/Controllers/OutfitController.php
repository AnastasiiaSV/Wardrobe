<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;
use Wardrobe\Models\Category;
use Wardrobe\Models\Item;
use Wardrobe\Models\Item_Outfit;
use Wardrobe\Models\Outfit;

class OutfitController extends Controller
{
    public  function index(){
        return view('item');
    }

    public function createOutfit(Request $request)
    {
        $name = $request->input('name');
        $declaration = $request->input('declaration');

        $creator_id = $request->input('creator_id');

        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required'
            ];
            $this->validate($request, $rules);
        }

        //Adding to oufits table
            $outfit = Outfit::create([
                'name' => $name,
                'creator_id' => $creator_id,
                'declaration' => $declaration,
            ]);

        //adding items and outfits matching in db
        //i.e. add items to current outfit

        /**
         * todo
         */
        $items_arr = array();

        foreach ($items_arr as $item) {
            $items_in_outfit = Item_Outfit::create([
                'item_id' => $creator_id,
                'creator_id' => $declaration,
            ]);
        }


            return view('item');
    }
}
