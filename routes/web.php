<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;

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

Route::get('/post', function () {
    return view('newpost');
});
Route::get('/user', function () {
    return view('user');
});

//Login route
Route::get('/login',[UserController::class, 'getLogin']);
Route::post('/login',[UserController::class, 'postLogin']);
Route::get('/register',[UserController::class, 'getRegister']);
Route::post('/register',[UserController::class, 'postRegister']);
Route::get('/',[UserController::class, 'index']);
Route::get('/logout',[UserController::class, 'LogoutAdmin']);
//endlogin
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
        Route::get("/", ["as" => "admin.hotels", "uses" => "AdminController@getAllPost"]);
        Route::get("add", ["as" => "admin.hotels.add", "uses" => "AdminController@AddHotel"]);
        Route::post("save", ["as" => "admin.hotels.add", "uses" => "AdminController@getSaveHotel"]);
        Route::get("delete/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@DeleteHotel"]);
        Route::get("edit/{id}", ["as" => "admin.hotels.edit", "uses" => "AdminController@EditHotel"]);
        Route::post("update/{id}", ["as" => "admin.hotels.eidt", "uses" => "AdminController@UpdateHotel"]);
    });
    Route::group(["prefix" => "categories"], function() {
        Route::get("/", ["as" => "admin.categories", "uses" => "AdminController@getAllCategories"]);
        Route::get("add", ["as" => "admin.categories.add", "uses" => "AdminController@AddCategories"]);
        Route::post("save", ["as" => "admin.categories.add", "uses" => "AdminController@getSaveCategories"]);
        Route::get("delete/{id}", ["as" => "admin.categories.edit", "uses" => "AdminController@DeleteCategories"]);
        Route::get("edit/{id}", ["as" => "admin.categories.edit", "uses" => "AdminController@EditCategories"]);
        Route::post("update/{id}", ["as" => "admin.categories.eidt", "uses" => "AdminController@UpdateCategories"]);
    });

});


