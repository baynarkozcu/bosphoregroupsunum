<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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


                    //!DASHBOARD ROUTES
Route::middleware("auth")->group(function(){

    Route::get('/', [DashboardController::class , 'index'] )->name('dashboard');


                    //!POST ROUTES
    Route::get('/posts' , [PostController::class , 'getposts'])->name('getposts');
    Route::get('/posts/{id}' , [PostController::class , 'singlepost'])->name('singlepost');
    Route::post('/posts' , [PostController::class , 'addpost'])->name('addpost');
    Route::delete('/posts/{id}' , [PostController::class , 'deletepost'])->name('deletepost');

                    //!POST LİKES ROUTES
    Route::post('/posts/{post}/like' , [PostController::class , 'likepost'])->name('likepost');
    Route::delete('/posts/{post}/like' , [PostController::class , 'destroy'])->name('unlikepost');

    Route::get('/user/{user}', [PostController::class , 'userposts'])->name('userposts');
});

                    //!USER LOGİN ROUTES
Route::get('/kayit-ol' , [UserController::class , 'register'] )->name('register');
Route::post('/kayit-ol' , [UserController::class , 'store'] );
Route::get('/giris-yap' , [UserController::class , 'login'] )->name('login');
Route::post('/giris-yap' , [UserController::class , 'loginUser'] );
Route::get('/cikis-yap' , [UserController::class , 'cikisyap'] )->name('cikisyap');


