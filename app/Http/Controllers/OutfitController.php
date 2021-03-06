<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;
use Wardrobe\Models\Category;
use Wardrobe\Models\Item;
use Wardrobe\Models\Item_Outfit;
use Wardrobe\Models\Outfit;
use Wardrobe\Models\Wardrobe;
use App;
use Config;
use Illuminate\Support\Facades\Cookie;
class OutfitController extends Controller
{
    public  function index(){
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        return view('item');
    }

    public function createOutfit(Request $request)
    {
        $name = $request->input('name');
        $declaration = $request->input('declaration');
        $wardrobe_id = $request->input('wardrobe_id');
        $creator_id = $request->input('creator_id');

        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required'
            ];
            $this->validate($request, $rules);
        }

        if(isset($name) && isset($declaration)
            && isset($wardrobe_id) && isset($creator_id)){

            //Adding to oufits table
            $outfit = Outfit::create([
                'name' => $name,
                'declaration' => $declaration,
                'creator_id' => $creator_id,
                'wardrobe_id' => $wardrobe_id
            ]);

            $outfit_id = $outfit->id;
            //var_dump($outfit);

            //adding items and outfits matching in db
            //i.e. add items to current outfit
            $items_arr = $request->input('check-items');
                if(isset($items_arr)){
                    foreach ($items_arr as $item_in_outfit) {
                        //var_dump($item_in_outfit);

                        $item_outfit = Item_Outfit::create([
                            'item_id' => $item_in_outfit,
                            'outfit_id' => $outfit_id
                        ]);
                    }
                }

            return redirect("/outfit/$outfit->id");
            // return view('outfit', ['vars' =>  [$outfit]]);

        }else{
            echo "Missing value";
        }

    } //end createOutfit()


    public function editOutfitDeclaration(Request $request)
    {
        $outfit_id = $request->input('outfit_id');
        $name = $request->input('name');
        $declaration = $request->input('declaration');

        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required'
            ];
            $this->validate($request, $rules);
        }

        if(isset($outfit_id)){

            if(isset($name)){
                $outfit = Outfit::where('id', $outfit_id)
                    ->update(['name' => $name
                    ]);
            }
            if(isset($declaration)){
                $outfit = Outfit::where('id', $outfit_id)
                    ->update(['declaration' =>$declaration
                    ]);
            }

            $outfit = Outfit::find($outfit_id);

            return redirect("/outfit/$outfit->id");
            //return view('outfit', ['vars' =>  [$outfit]]);

        }else{
            echo "Missing outfit";
        } //end if(isset($outfit_id))

     }



    public function deleteItemsFromOutfit(Request $request)
    {
        $outfit_id = $request->input('outfit_id');
        $items_arr = $request->input('check-items');

        if(isset($outfit_id)){
            if(isset($items_arr)){
                foreach ($items_arr as $item_in_outfit) {
                    $item_exists = Item_Outfit::where([
                        'item_id' => $item_in_outfit,
                        'outfit_id' => $outfit_id
                    ])->delete();
                }
            }

            $outfit = Outfit::find($outfit_id);
            return redirect("/outfit/$outfit->id");
           // return view('outfit', ['vars' =>  [$outfit]]);

        }else{
            echo "Missing outfit";
        }

    }

    public function addItemsToOutfit(Request $request)
    {
        $outfit_id = $request->input('outfit_id');
        $items_arr = $request->input('check-items');

        if(isset($outfit_id)){
            if(isset($items_arr)){

                foreach ($items_arr as $item_in_outfit) {
                    $item_exists = Item_Outfit::where([
                        'item_id' => $item_in_outfit,
                        'outfit_id' => $outfit_id
                    ]) ->get();
                    //var_dump($item_exists);

                    if(count($item_exists)==0)
                    {
                        $item_outfit = Item_Outfit::create([
                            'item_id' => $item_in_outfit,
                            'outfit_id' => $outfit_id
                        ]);
                    }
                }
            }

            $outfit = Outfit::find($outfit_id);
            return redirect("/outfit/$outfit->id");
            //return view('outfit', ['vars' =>  [$outfit]]);

        }else{
            echo "Missing outfit";
        }
     }


    public function deleteOutfit(Request $request)
    {
        $outfit_id = $request->input('outfit_id');
        $wardrobe_id = $request->input('wardrobe_id');

            $item_exists = Item_Outfit::where([
                'outfit_id' => $outfit_id
            ])->delete();

        $item = Outfit::where('id', $outfit_id)->delete();

        return redirect("/account");
        //return redirect("/wardrobe/$wardrobe_id");
        // return view('outfit', ['vars' =>  [$outfit]]);
    }


}
