<?php
use Wardrobe\Models\Wardrobe;
use Wardrobe\Models\Outfit;
use Wardrobe\Models\Item;
/*
Route::any('/',['uses' => 'HomeController@index', 'as' => 'home']);

Route::any('/login',['uses' => 'LoginController@index', 'as' => 'login']);

Route::any('/item',['uses' => 'ItemController@index', 'as' => 'item']);

Route::any('/wardrobe',['uses' => 'WardrobeController@index', 'as' => 'wardrobe']);
*/

//////////////////////
Route::any('/main_page', 'MainController@index');
Route::any('/login', 'LoginController@index');
Route::any('/contacts', function () {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    return view('contacts');
});
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

    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    return view('wardrobe',['wardrobe' => $wardrobe]);
});

//go to particular outfit page
Route::get('/outfit/{i_id}', function ($i_id) {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    $outfit = Outfit::find($i_id);
    return view('outfit', ['vars' =>  [$outfit]]);
});

//go to particular outfit page
Route::get('/edit_outfit/{i_id}', function ($i_id) {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    $outfit = Outfit::find($i_id);
    return view('edit_outfit', ['vars' =>  [$outfit]]);
});


//go to particular item page
Route::get('/item/{id}', function ($id) {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    $item = Item::find($id);
    return view('item',['item' => $item]);
});

//go to particular item page
Route::get('/edit_item/{id}', function ($id) {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

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


Route::get('setlocale/{locale}', function ($locale) {
   // return redirect()->back()->cookie('Lang',$locale, 60); # Редиректим его <s>назад</s> на ту же страницу
    App::setLocale($locale);
    return response(view('login'))
        ->cookie('Lang',$locale, 60);
});

