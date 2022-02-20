<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
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
    return view('welcome');
});

//Route::get('/pages', function(){
//    return view('pages.pages');
//})->name('pages');

// 首页
Route::get('/pages', [IndexController::class, 'index'])->name('pages');

// 关于我们
Route::get('/about', function (){
    return view('pages.about');
})->name('about');

// 会员注册
Route::get('/register', function (){
    return view('pages.register');
})->name('register');

// 测试用例
Route::get('/controller', [TestController::class, 'demo']);

Route::get('/test', function () {
})->name('test');
