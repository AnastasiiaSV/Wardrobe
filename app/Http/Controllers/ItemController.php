<?php

namespace Wardrobe\Http\Controllers;
use Illuminate\Http\Request;
use Wardrobe\Models\Category;
use Wardrobe\Models\Type;
use Wardrobe\Models\Item;
use Wardrobe\Models\Wardrobe_Item;
use Wardrobe\Models\Item_Outfit;
use App;
use Config;
use Illuminate\Support\Facades\Cookie;
class ItemController extends Controller
{
    public  function index(){
        //язык
        $conf_locale = Config::get('app.locale');
        $locale = Cookie::get('Lang', $conf_locale);
        App::setLocale($locale);

        return view('item');
    }

    public function createItem(Request $request)
    {

        /*
         * todo
         * //валидация вормы
         */

        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $type_id = $request->input('type_id');
        $season_id = $request->input('season_id');
        $place_id = $request->input('place_id');
        $file = $request->file('file');

        $wardrobe_id = $request->input('wardrobe_id');

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

        //проверка расширения файла.Должно быть изображение
        $isRightFile = false;
        if(isset($file)){
            $arr =  (explode(".", $file_name));
            $exten = end($arr);
            if($exten == "jpg" || $exten =="jpeg" || $exten == "png") $isRightFile = true;
        }

        //check type to category matching
        $isRightType = false;
        if(isset($category_id) && isset($type_id)){
            $type = Type::find($type_id);
            if($type->category_id == $category_id) $isRightType = true;
        }


        if(isset($name) && $isRightType && $isRightFile &&
            isset($category_id) && isset($type_id) && isset($season_id) && isset($place_id) &&
            isset($file) && isset($creator_id) && isset($wardrobe_id)){

            $item = Item::create([
                'name' => $name,
                'category_id' => $category_id,
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

            return redirect("/item/$item->id");

        }else{
            /*
             * todo
             * */
            echo "Missing or wrong value";
        }
    }

    public function editItem(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $type_id = $request->input('type_id');
        $season_id = $request->input('season_id');
        $place_id = $request->input('place_id');

        if(isset($id)){
            $old_item = Item::find($id);
           // var_dump($old_item);

            if(isset($name) && strcmp($name, $old_item->name)){
                $item = Item::where('id', $id)
                    ->update(['name' => $name]);
            }
            if(isset($category_id) && $category_id != $old_item->category_id){
                $item = Item::where('id', $id)
                    ->update(['category_id' =>$category_id]);
            }

            //check type to category matching
            $isRightType = false;
            if(isset($category_id) && isset($type_id)){
                $type = Type::find($type_id);
                if($type->category_id == $category_id) $isRightType = true;
            }
            if(isset($type_id) && $isRightType && $type_id != $old_item->type_id){
                $item = Item::where('id', $id)
                    ->update(['type_id' =>$type_id]);
            }
            if(isset($season_id) && $season_id != $old_item->season_id){
                $item = Item::where('id', $id)
                    ->update(['season_id' =>$season_id]);
            }
            if(isset($place_id) && $place_id != $old_item->place_id){
                $item = Item::where('id', $id)
                    ->update(['place_id' =>$place_id]);
            }

            $item = Item::find($id);

            return redirect("/item/$item->id");
           // return view('item',['item' => $item]);

////////////////////////////
            /*
             * todo
             * что будет работать быстрее ???
             * */

            /*
            $item = Item::where('id', $id)
                ->update(['name' => $name,
                    'category_id' =>$category_id,
                    'type_id' => $type_id,
                    'season_id' => $season_id,
                    'place_id' => $place_id,
                ]);

            $item = Item::find($id);

            return view('item',['item' => $item]);
            */

        }else{
            echo "Missing item";
        }

    }

    public function deleteItem(Request $request)
    {
        $item_id = $request->input('item_id');
        $wardrobe_id = $request->input('wardrobe_id');

       // foreach ($items_arr as $item_in_outfit) {
            $item_exists = Item_Outfit::where([
                'item_id' => $item_id
            ])->delete();
      //  }

        $item = Item::where('id', $item_id)->delete();

        return redirect("/account");
        //return view('item',['item' => $item]);
    }
}
