<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/apartment', function () {
    return view('apartment');
});
Route::get('/house', function () {
    return view('house');
});
Route::get('/motel', function () {
    return view('motel');
});
Route::get('/detail', function () {
    return view('detail');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/post', function () {
    return view('newpost');
});
Route::get('/user', function () {
    return view('user');
});
/*
********************************************************************
*******************ROUTE Ở PHẦN GIAO DIỆN ADMIN********************
********************************************************************
*/
Route::group(['module' => 'admin', 'middleware' => 'web', 'namespace' => "App\Http\Controllers"], function () {
   


    //  Route::group(['middleware' => ['auth']], function () {
        Route::group(["prefix" => "admin"], function() {
            //  Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            // return view('dashboard');
            // })->name('dashboard');
        //Dashboard
        Route::get("/", ["as" => "admin.dashboard.index", "uses" => "AdminController@getIndexAdmin"]);
        
        // });

      

    });
    Route::group(["prefix" => "posts"], function() {
        Route::get("/", ["as" => "admin.hotels", "uses" => "AdminController@getAllHotel"]);
        Route::get("add", ["as" => "admin.hotels.add", "uses" => "AdminController@AddHotel"]);
        Route::post("save", ["as" => "admin.hotels.add", "uses" => "AdminController@getSaveHotel"]);
        Route::get("delete/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@DeleteHotel"]);
        Route::get("edit/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@EditHotel"]);
        Route::post("update/{id}", ["as" => "admin.hotels.eidt", "uses" => "AdminController@UpdateHotel"]);
    });

});


