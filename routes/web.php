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

// Auth Routes
//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



// Protected Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {

//    Route::get('/', function () {
//        return redirect('users');
//    });

    // 首页
    Route::get('/', 'HomeController@getHomeExample');
    // 新增用户页面
    Route::get('register', 'UserRegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'UserRegisterController@register');

});


// Basic Routes
//Route::get('/home', 'HomeController@index');

// Protected Routes
Route::group(['middleware' => 'auth'], function () {

//    Route::get('/', function () {
//        return redirect('users');
//    });

    Route::get('/', 'ExampleController@getIndexExample');
    Route::get('/', 'ExampleController@getIndexExample');
    Route::get('blank-example', 'ExampleController@getBlankExample');
    Route::get('desktop-example', 'ExampleController@getDesktopExample');

    Route::get('users', 'UserController@getUserList');

});


// Mobile Routes
Route::group(['prefix' => 'm', 'namespace' => 'Mobile'], function () {

    // Mobile App
    Route::get('/', 'MobileController@getIndex');

    Route::get('/app', 'MobileController@getApp');

    // Protected Routes
    Route::group(['middleware' => 'auth'], function () {

        Route::get('users', 'UserController@getUserList');

        Route::get('users/{id}', 'UserController@getUserDetail');

    });

});

// Wechat Routes
Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat'], function () {

    // Wechat App
    Route::any('serve', 'WeChatController@serve');

    // Protected Routes
    Route::group(['middleware' => ['web', 'wechat.oauth']], function () {



    });

});

// Console Routes
Route::group(['prefix' => 'console', 'middleware' => 'auth', 'namespace' => 'Console'], function () {

    Route::get('/', 'ConsoleController@getConsoleHome');
    Route::get('oauth', 'ConsoleController@getOauth');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@getUserList');
    });

});

// Image Routes
// @WARNING: The 'image' prefix is reserved for SomelineImageService
Route::group(['prefix' => 'image'], function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/', 'ImageController@postImage');
    });

    Route::get('{type}/{name}', 'ImageController@showTypeImage');
    Route::get('/{name}', 'ImageController@showOriginalImage');

});

// Locale Routes
// @WARNING: The 'locales' prefix is reserved for SomelineLocaleController
Route::group(['prefix' => 'locales'], function () {

    Route::get('/{locale}.js', '\Someline\Support\Controllers\LocaleController@getLocaleJs');

    Route::get('/switch/{locale}', '\Someline\Support\Controllers\LocaleController@getSwitchLocale');

});

//test
Route::get('/email', function(){
    $data = [
        'url'  => 'https://laravel.com',
        'name' => 'laravel'
    ];

    Mail::send('emails.register', $data, function ($message) {
        $message->from('test@push.deepspring.cn', 'Deepspring');
        $message->to('cry@deepspring.cn');
        $message->subject('Hello World');
    });
});