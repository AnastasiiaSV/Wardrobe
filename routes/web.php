<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});


Route::any('/', function () {
    return view('welcome');
});
*/


/*
Route::any('/',['uses' => 'HomeController@index', 'as' => 'home']);

Route::any('/login',['uses' => 'LoginController@index', 'as' => 'login']);

Route::any('/item',['uses' => 'ItemController@index', 'as' => 'item']);

Route::any('/wardrobe',['uses' => 'WardrobeController@index', 'as' => 'wardrobe']);
*/

//////////////////////
///

Route::any('/', 'MainController@index');

Route::post('/account', 'MainController@gotoAccountPage');
Route::post('/posts', 'MainController@gotoPostsPage');

Route::any('/wardrobe', 'WardrobeController@index');
Route::post('/new_item', 'WardrobeController@gotoNewItemPage');
Route::post('/outfit', 'WardrobeController@gotoOutfitPage');

Route::any('/new_item/ok', 'ItemController@createItem');

Route::any('/new_outfit', 'OutfitController@createOutfit');


Route::any('/account', 'AccountController@index');

Route::post('/account/wardrobes', 'AccountController@showWardrobes');
Route::post('/wardrobe', 'AccountController@gotoWardrobe');

