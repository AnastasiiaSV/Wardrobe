<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;
use Wardrobe\Models\Category;
use Wardrobe\Models\Item;

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

            $item = Item::create([
                'name' => $name,
                'category_id' =>$category_id,
                'type_id' => $type_id,
                'season_id' => $season_id,
                'path' => "$path/$file_name",
                'creator_id' => $creator_id,
            ]);

            return view('item');
    }
}
