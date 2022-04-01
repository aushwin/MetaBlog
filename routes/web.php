<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use \Illuminate\Support\Facades\File;
use App\Models\User;
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

Route::get('/',[PostController::class,'index'])->name('home');


Route::get('posts/{post:slug}',[PostController::class,'show']);

Route::get('categories/{category:slug}',[PostController::class,'getByCategory'])->name('category');

Route::get('authors/{author:username}',[PostController::class,'getByAuthor']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('admin/posts/create',[PostController::class,'create'])->middleware('auth');
Route::post('admin/posts',[PostController::class,'store'])->middleware('auth');
