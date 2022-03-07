<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ArticlesContriller;
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
Route::get('/index', [IndexController::class, 'index'])
    ->name('index');

// 关于我们
Route::get('/about', function () {
    return view('pages.about');
})
    ->name('about');

// 会员注册
Route::get('/register', function () {
    return view('pages.register');
})
    ->name('register');

// 产品及服务
Route::get('/ProductsandServices', function () {
    return view('pages.products_and_services');
})
    ->name('ProductsandServices');

// article文章
Route::get('/articles/{post}',[ArticlesContriller::class, 'show'])
    ->name('articles.show')
    ->whereNumber('post');

Route::get('/articles/tag/{category}', [ArticlesContriller::class, 'index'])
    ->name('articles.index')
    ->whereNumber('postCategory');

Route::get('/articles', [ArticlesContriller::class, 'all'])
    ->name('articles.all');

// 自定义404
Route::get('/404', function (){
    return view('common.404');
});

// 测试用例
//Route::get('/controller', [TestController::class, 'demo']);
Route::get('/controller/{post}', [TestController::class, 'demo'])
    ->name('controller')->whereNumber('id');

Route::get('/test/{id}', function ($id) {
    return view('test', compact('id'));
})
    ->name('test')
    ->whereNumber('id');
