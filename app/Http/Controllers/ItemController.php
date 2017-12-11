<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;
use Wardrobe\Models\Category;
use Wardrobe\Models\Item;
use Wardrobe\Models\Wardrobe_Item;

class ItemController extends Controller
{
    public  function index(){

        return view('item');
    }

    public function createItem(Request $request)
    {
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $type_id = $request->input('type_id');
        $season_id = $request->input('season_id');
        $place_id = $request->input('place_id');
        $file = $request->file('file');

        $category = Category::find($category_id);
        $path = "content/$category->name";

        $creator_id = $request->input('creator_id');
       // $creator_id = 1;

        //валидация вормы
        if ($request->isMethod('post')) {
            $rules = [
                'file' => 'required',
                'name' => 'required'
            ];
            $this->validate($request, $rules);
        }

        $file_name = time().'_'.$file->getClientOriginalName();
        $file->move($path, $file_name);
        $wardrobe_id = $request->input('wardrobe_id');

            $item = Item::create([
                'name' => $name,
                'category_id' =>$category_id,
                'type_id' => $type_id,
                'season_id' => $season_id,
                'place_id' => $place_id,
                'path' => "$path/$file_name",
                'creator_id' => $creator_id,
                'wardrobe_id' => $wardrobe_id,
            ]);


        $wardrobe_item = Wardrobe_Item::create([
            'wardrobe_id' =>$wardrobe_id,
            'item_id' => $item->id,
        ]);

        return view('item',['item' => $item]);
    }


    public function editItem(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $type_id = $request->input('type_id');
        $season_id = $request->input('season_id');
        $place_id = $request->input('place_id');

        $category = Category::find($category_id);

        $item = Item::where('id', $id)
                    ->update(['name' => $name,
                        'category_id' =>$category_id,
                        'type_id' => $type_id,
                        'season_id' => $season_id,
                        'place_id' => $place_id,
                        ]);

        $item = Item::find($id);

        return view('item',['item' => $item]);
    }

    public function deleteItem(Request $request)
    {
        $id = $request->input('id');

        $item = Item::where('id', $id)->delete();

        //$item = Item::find($id);

        //return view('item',['item' => $item]);
    }
}
