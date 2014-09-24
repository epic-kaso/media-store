<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.index');
});

Route::group(array('domain' => '{account}.'.$_SERVER['HTTP_HOST']), function()
{
	Route::get('/',function($account){
		echo 'Welcome '.$account;
	});
	
    Route::get('user/{id}', function($account, $id)
    {
        //
    });

});
Route::resource('roles','RolesController');