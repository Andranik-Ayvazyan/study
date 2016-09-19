<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('/', function () {

        return view('welcome');

    })->name('das');

  /*  Route::pattern('id', '[0-9]+');// global constraints

    Route::get('/user/{name?}', function ($name = null) {
        echo "user : ".$name;
    });


    Route::get('/user/{name}/{id}', function ($name,$id) {

        if(Route::input('id') == 1) {
            echo "aaaaa";
        }

        echo "user : ".$name." ".$id;

    }) -> where (['name' => '[A-Za-z]+', 'id' => '[0-9]+' ]);

      Route::get('/user/profile',['as' => 'profile',function(){

         echo 'yess' ;

      }]);


    Route::get('/user/account',['as' => 'account',function(){
        echo 'yess account<br>' ;
        echo Route::currentRouteName();
    }]);



    Route::get('/user/profile', 'UserController@showProfile')->name('profile');



    Route::group(['prefix' => 'admin'], function()
    {

        Route::get('foo', function()
        {
            echo "foo";
        });

    });


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/use', function ()    {

        });

        Route::get('user/profile', function () {

        });
    });


*/

//    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('login', 'Auth\AuthController@getLogin');

    Route::post('login', 'Auth\AuthController@postLogin');

    Route::get('register', 'Auth\AuthController@showRegistrationForm');

    Route::post('register', 'Auth\AuthController@postRegister');

    Route::get('logout','Auth\AuthController@logout');


    Route::group(['middleware' => 'web',], function () {

        Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {

            Route::get('/dashboard','Admin\AdminController@index');

            Route::resource('products','ProductController');

            Route::post('products/data',[ 'as' => 'products.data', 'uses' => 'ProductController@data']);

            Route::resource('products/{id}','ProductController@destroy');

        });

    });

    Route::get('/cards','CardsController@index');

    Route::get('/cards/{card}','CardsController@show');


