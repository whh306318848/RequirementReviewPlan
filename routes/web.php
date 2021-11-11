<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/greeting', function () {
        return "hello world";
    });
});

Route::get('/user/{id}/{name}',
    [\App\Http\Controllers\UserController::class, 'index']
)->where(['id'=> '[0-9]+', 'name'=>'[A-Za-z]+']);

Route::match(['get', 'post'], '/match', function () {
    return "match";
});

Route::any('/any', function () {
    return "any";
});

// 接受任何请求类型，id的类型在App\Providers\RouteServiceProvider类的boot方法中被强制指定为0-9的整数
Route::any('/any/{id}', function ($id) {
    return "any id=".$id;
});

Route::get('/users', function (\Illuminate\Http\Request $request) {
    die(get_class($request));
});

Route::redirect('/', '/user', 301);

// Laravel 路由组件允许除 / 之外的所有字符。你必须使用 where 条件正则表达式显式地允许 / 成为占位符的一部分：
// 注意：正斜杠字符仅在最后一个路由段中是支持的。
Route::get('/search/{search}', function ($search){
    return $search;
})->where('search', '.*');
