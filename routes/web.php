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


