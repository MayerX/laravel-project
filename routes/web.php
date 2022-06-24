<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ArticlesContriller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PrescriptionController;
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
Route::prefix('doctor')->name('Doctor.')->middleware('check.session')->group(function () {
    Route::get('', [DoctorController::class, 'index'])->name('index');

    // 患者信息
    Route::prefix('patients')->name('Patients.')->group(function () {
        Route::get('', [PatientController::class, 'index'])->name('index');
        Route::get('{patientId}', [PatientController::class, 'show'])
            ->whereNumber('patientId')->name('show');
        Route::get('return', [DoctorController::class, 'quit_patient'])->name('return');
    });

    // 康复处方
    Route::prefix('prescription')->name('Prescription.')->group(function () {
        Route::get('{patientId}', [PrescriptionController::class, 'show'])
            ->whereNumber('patientId')->name('show');
        Route::get('{patientId}/{time}', [PrescriptionController::class, 'destroy'])
            ->whereNumber('patientId')
            ->where('time', '(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})')
            ->name('destroy');
        Route::get('create', [PrescriptionController::class, 'create_get'])
            ->name('create_get');
        Route::post('create', [PrescriptionController::class, 'create_post'])
            ->name('create_post');
    });
    // 视频指导
    Route::prefix('guide')->name('Guide.')->group(function () {
        Route::get('{patientId}', [GuideController::class, 'index'])->name('index');
        Route::post('{patientId}', [GuideController::class, 'update'])->name('update');
    });
    // 康复数据
    Route::prefix('rehab')->name('Rehab.')->group(function () {
        Route::get('index', function () {
            return view('resources/doctor/rehab/index');
        })->name('rehab');
    });
    // 生成报告
    Route::prefix('report')->name('Report.')->group(function () {
        Route::get('index', function () {
            return view('resources/doctor/report/index');
        })->name('report');
    });
});

// patient患者
Route::prefix('patient')->name('Patient.')->middleware('check.session')->group(function (){

});

// 登录注册
Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::prefix('login')->name('Login.')->group(function () {
    Route::get('', [LoginController::class, 'index'])->name('index')->middleware('guest');
    Route::post('', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

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
