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
    return View::make('index');
});

Route::group(array('prefix' => ''), function()
{
    Route::resource('todos', 'TodoController');
});
/*Route::get('task', function()
{
    $title = Input::get('title');

    Log::info($title);
});*/

/*Route::get('todos', function()
{
    $myArr = array("John", "Mary", "Peter", "Sally");

    echo $myArr;
    return Response::json($myArr);
});*/