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

Route::any('/posts', 'MainController@gotoPostsPage');

Route::any('/new_wardrobe', 'WardrobeController@gotoNewWardrobePage');
Route::post('/create_wardrobe', 'WardrobeController@createWardrobe');
Route::any('/new_item', 'WardrobeController@gotoNewItemPage');
Route::any('/outfit', 'WardrobeController@gotoNewOutfitPage');

Route::post('/new_item/ok', 'ItemController@createItem');

Route::post('/item', 'ItemController@editItem');
Route::post('/item_deleted', 'ItemController@deleteItem');

Route::post('/new_outfit', 'OutfitController@createOutfit');
Route::post('/outfit_deleted', 'OutfitController@deleteOutfit');
Route::post('/outfit/changed', 'OutfitController@editOutfitDeclaration');
Route::post('/outfit/items_removed', 'OutfitController@deleteItemsFromOutfit');
Route::post('/outfit/items_added', 'OutfitController@addItemsToOutfit');

Route::any('/account', 'AccountController@index');
Route::post('/account/info', 'AccountController@editAccountInfo');

Route::any('/account/wardrobes', 'AccountController@showWardrobes');
Route::any('/wardrobe', 'AccountController@gotoWardrobe');

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

Route::any('/account/{id}', function ($id) {
    //язык
    $conf_locale = Config::get('app.locale');
    $locale = Cookie::get('Lang', $conf_locale);
    App::setLocale($locale);

    return response(view('account', ['user_id' => $id]))
        ->cookie('UserId', $id, 60);
});




Route::post('/login/account/login',  'LoginController@doLogout');

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

