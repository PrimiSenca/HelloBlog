<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;




Route::get('/',[HomeController::class,'homepage']);

/*Route::get('/home',[AdminController::class,'index'])->name('home');*/


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home',[HomeController::class,'index'])->middleware(
'auth')->name('home');

Route::get('/post_page',[AdminController::class,'post_page']);	

Route::post('/add_post',[AdminController::class,'add_post']);

Route::get('/show_post',[AdminController::class,'show_post']);

Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);

Route::get('/edit_post/{id}',[AdminController::class,'edit_post']);

Route::post('/update_post/{id}',[AdminController::class,'update_post']);

Route::get('/post_details/{id}',[HomeController::class,'post_details']);

Route::get('/create_post',[HomeController::class,'create_post'])->middleware('auth');

Route::post('/user_post',[HomeController::class,'user_post'])->middleware('auth');

Route::get('/my_post',[HomeController::class,'my_post'])->middleware('auth');

Route::get('/my_post_del/{id}',[HomeController::class,'my_post_del'])->middleware('auth');

Route::get('/post_update_page/{id}',[HomeController::class,'post_update_page'])->middleware('auth');

Route::post('/update_post_data/{id}',[HomeController::class,'update_post_data'])->middleware('auth');

Route::get('/accept_post/{id}',[AdminController::class,'accept_post']);

Route::get('/reject_post/{id}',[AdminController::class,'reject_post']);

Route::get('/about_t',[HomeController::class,'about_t'])->name('about_t');

Route::get('/services_t',[HomeController::class,'services_t'])->name('services_t');

// routes/web.php
Route::post('add_commit/{post_id}/{user_id}', [HomeController::class, 'add_commit'])->middleware('auth')->name('add_commit');







/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
