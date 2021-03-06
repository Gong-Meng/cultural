<?php

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

Route::get("/","IndexController@index")->name("index");

//新闻资讯路由
Route::resource("new","NewsController");

//用户列表
Route::get("user","UserController@index")->name('user.index');

//日志管理路由
Route::get("log","LogController@index")->name("log.index");


//用户登录路由
Route::get("login","Auth\LoginController@showLoginForm")->name('login');
Route::post("login","Auth\LoginController@login");
Route::post("logout","Auth\LoginController@logout")->name('logout');

//用户注册路由
Route::get("register","Auth\RegisterController@showRegistrationForm")->name('register');
Route::post("register","Auth\RegisterController@register");

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');