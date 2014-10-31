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

Route::get("login","UserController@Get_login");
Route::post("login","UserController@Post_login");
Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/home',function()
{
	return View::make('home')
	->with("page","home");
});
Route::get("/org/add", ['as'=>'OrgAdd', 'uses'=>'OrgController@Get_Add']);
Route::post("/org/addnew","OrgController@Post_Add");
Route::get("org",function()
{
	return View::make("org.list")
	->with("org",Org::where("admin",Auth::id())->paginate(2))
	->with("page","org");
});