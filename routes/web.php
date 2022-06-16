<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ArticlesContriller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoctorController;
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
Route::get('/register_info', function () {
    return view('pages.register_info');
})
    ->name('registerInfo');

// 产品及服务
Route::get('/ProductsandServices', function () {
    return view('pages.products_and_services');
})
    ->name('ProductsandServices');

// article文章
Route::prefix('articles')->name('Articles.')->group(function () {
    Route::get('{post}', [ArticlesContriller::class, 'show'])->whereNumber('post')->name('show');
    Route::get('tag/{category}', [ArticlesContriller::class, 'index'])->whereNumber('category')->name('index');
    Route::get('', [ArticlesContriller::class, 'showAll'])->name('all');
    Route::get('/search', [ArticlesContriller::class, 'search'])->name('search');
});

// doctor医生
Route::prefix('doctor')->name('Doctor.')->group(function (){
    Route::get('', [DoctorController::class, 'index'])->name('index');
    Route::get('patients', [DoctorController::class, 'show_patients'])->name('show_patients');
    Route::get('patient_detail', function (){
        return view('resources/doctor/patient_detail');
    })->name('show_patient');
    // 康复处方
    Route::prefix('prescription')->name('Prescription.')->group(function (){
        Route::get('index', function (){
            return view('resources/doctor/prescription/index');
        })->name('index');
        Route::get('show', function (){
            return view('resources/doctor/prescription/show');
        })->name('show');
    });
    // 视频指导
    Route::prefix('guide')->name('Guide.')->group(function (){
        Route::get('index', function (){
            return view('resources/doctor/guide/index');
        })->name('index');
    });
    // 康复数据
    Route::prefix('rehab')->name('Rehab.')->group(function (){
        Route::get('index', function (){
            return view('resources/doctor/rehab/index');
        })->name('rehab');
    });
    // 生成报告
    Route::prefix('report')->name('Report.')->group(function (){
        Route::get('index', function (){
            return view('resources/doctor/report/index');
        })->name('report');
    });
});

// 登录注册
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/login', [LoginController::class, 'create'])->name('login');

//Route::group(['prefix'=>'articles', 'namespace'=>'Articles'], function ()`{
//    Route::get('{post}', [ArticlesContriller::class, 'show'])->whereNumber('post')->name('show');
//    Route::get('tag/{category}', [ArticlesContriller::class, 'index'])->whereNumber('category')->name('index');
//    Route::get('')->name('all');
//    Route::get('/search', [ArticlesContriller::class, 'search'])->name('search');
//});

//Route::get('/articles/{post}',[ArticlesContriller::class, 'show'])
//    ->name('articles.show')
//    ->whereNumber('post');
//
//Route::get('/articles/tag/{category}', [ArticlesContriller::class, 'index'])
//    ->name('articles.index')
//    ->whereNumber('postCategory');
//
//Route::get('/articles', [ArticlesContriller::class, 'showAll'])
//    ->name('articles.all');
//
//Route::get('/articles/search', [ArticlesContriller::class, 'search'])
//    ->name('articles.search');

// 自定义404
Route::get('/404', function () {
    return view('errors.404');
});

// 测试用例
//Route::get('/controller', [TestController::class, 'demo']);
Route::get('/controller', [TestController::class, 'demo'])
    ->name('controller');

Route::get('/test', function () {
    return view('test');
})
    ->name('test')
    ->whereNumber('id');
