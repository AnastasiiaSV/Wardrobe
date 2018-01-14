<?php
use Wardrobe\Models\Wardrobe;
use Wardrobe\Models\Outfit;
use Wardrobe\Models\Item;
use Wardrobe\Http\Middleware\Locale;
/*
Route::any('/',['uses' => 'HomeController@index', 'as' => 'home']);

Route::any('/login',['uses' => 'LoginController@index', 'as' => 'login']);

Route::any('/item',['uses' => 'ItemController@index', 'as' => 'item']);

Route::any('/wardrobe',['uses' => 'WardrobeController@index', 'as' => 'wardrobe']);
*/

Route::group(['prefix' => Locale::getLocale()], function(){

    //////////////////////
    Route::view('/main_page', 'main_page');
    Route::view('/login', 'login');
    Route::view('/contacts', 'contacts');
///////////

    Route::any('/', 'MainController@index');

    Route::post('/posts', 'MainController@gotoPostsPage');

    Route::any('/new_wardrobe', 'WardrobeController@gotoNewWardrobePage');
    Route::any('/create_wardrobe', 'WardrobeController@createWardrobe');
    Route::post('/new_item', 'WardrobeController@gotoNewItemPage');
    Route::post('/outfit', 'WardrobeController@gotoNewOutfitPage');

    Route::any('/new_item/ok', 'ItemController@createItem');
    Route::any('/item', 'ItemController@editItem');
    Route::any('/item_deleted', 'ItemController@deleteItem');

    Route::any('/new_outfit', 'OutfitController@createOutfit');
    Route::any('/outfit_deleted', 'OutfitController@deleteOutfit');
    Route::any('/outfit/changed', 'OutfitController@editOutfitDeclaration');
    Route::any('/outfit/items_removed', 'OutfitController@deleteItemsFromOutfit');
    Route::any('/outfit/items_added', 'OutfitController@addItemsToOutfit');

    Route::any('/account', 'AccountController@index');

    Route::post('/account/wardrobes', 'AccountController@showWardrobes');
    Route::post('/wardrobe', 'AccountController@gotoWardrobe');

//go to particular wardrobe page
    Route::get('/wardrobe/{id}', function ($id) {
        $wardrobe = Wardrobe::find($id);
        return view('wardrobe',['wardrobe' => $wardrobe]);
    });

//go to particular outfit page
    Route::get('/outfit/{i_id}', function ($i_id) {
        $outfit = Outfit::find($i_id);
        return view('outfit', ['vars' =>  [$outfit]]);
    });

//go to particular outfit page
    Route::get('/edit_outfit/{i_id}', function ($i_id) {
        $outfit = Outfit::find($i_id);
        return view('edit_outfit', ['vars' =>  [$outfit]]);
    });


//go to particular item page
    Route::get('/item/{id}', function ($id) {
        $item = Item::find($id);
        return view('item',['item' => $item]);
    });

//go to particular item page
    Route::get('/edit_item/{id}', function ($id) {
        $item = Item::find($id);
        return view('edit_item',['item' => $item]);
    });

////////////////////////////////////////////////////

// route to show the login form
    Route::any('/login',  'LoginController@gotoLoginPage');
    Route::any('/login/account',  'LoginController@doLogin');
    Route::any('/login/account/login',  'LoginController@doLogout');

    Route::any('/signup',  'LoginController@gotoSignUpPage');
    Route::any('/new_account', 'LoginController@doSignUp');







//Settings: show form to create settings
    Route::get( '/settings/new', array(
        'as' => 'settings.new',
        'uses' => 'SettingsController@add'
    ) );

//Settings: create a new setting
    Route::post( '/settings', array(
        'as' => 'settings.create',
        'uses' => 'SettingsController@create'
    ) );


//
    Route::any('/setlocale/{loc}', function ($loc) {
        App::setLocale("$loc");
        $referer = Redirect::back()->getTargetUrl();
        // return redirect($referer);
        //route("/main_page");
        return view('main_page');
    });



});


//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], Wardrobe\Http\Middleware\Locale::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != Wardrobe\Http\Middleware\Locale::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
