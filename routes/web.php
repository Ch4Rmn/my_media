<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrendPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


// Admin Profile
    // Profile DirectLink
    Route::get('dashboard',[ProfileController::class , 'profile'])->name('dashboard');
    // Profile Update
    Route::post('admin/update',[ProfileController::class , 'update'])->name('admin#update');
    //admin directChangePasswordPage
    Route::get('admin/directChangePasswordPage',[ProfileController::class,'directChangePasswordPage'])->name('admin#directChangePasswordPage');
    //change password
    Route::post('admin/ChangePasswordPage',[ProfileController::class, 'ChangePasswordPage'])->name('admin#ChangePasswordPage');


// Admin list
    Route::get('admin/list',[ListController::class , 'list'])->name('admin#list');
    // admin delete with GET
    Route::get('admin/listDelete/{id}', [ListController::class ,'listDelete'])->name('admin#deleteList');
    // admin list Search
    Route::post('admin/list', [ListController::class , 'listSearch' ])->name('admin#listSearch');


//Admin Category
    Route::get('category',[CategoryController::class ,'category'])->name('admin#category');

// Admin Post
    Route::get('post' , [PostController::class ,'post'])->name('admin#post');

// Admin TrendPost
    Route::get('trendPost', [TrendPostController::class ,'trendPost'])->name('admin#trendPost');
});

