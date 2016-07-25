<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   
});

Route::auth();


Route::get('/home', 'HomeController@index');

/* Grupo de rutas para el administrador (el que registrará a los técnicos) 
*/
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::resource('users','UsersController');
});


Route::get('enviar', ['as' => 'enviar', function () {
 
    $data = ['link' => 'http://keepsafe.com'];
 
    \Mail::send('emails.password', $data, function ($message) {
 
        $message->from('from@example.com', 'Example');
 
        $message->to('mdm_beas@hotmail.com')->subject('Password');
 
    });
 
    return "Se envío el email";
}]);
