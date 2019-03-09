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

// Route::get('/', function () {
//     return view('FrontEnd/home');
// });

Route::get('/','HomeController@index')->name('home');
Route::get('/post/{slug}','HomeController@index')->name('post.details');
Route::post('subscriber','SubsciberController@store')->name('subscriber.store');

Route::group(['middleware'=>['auth']], function (){
    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
 });
Auth::routes();
// Route::resource('category','CategoryController');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
    Route::resource('parentcategory','ParentCategoryController');
    Route::resource('childcategory','ChildCategoryController');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::resource('subscriber','SubscriberController');


    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::post('/post/{post}','PostController@approval')->name('post.approval');

});
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');


});

