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
use App\Link;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RESOURCE CURD 
Route::resource('ajax-posts', 'ajaxcrud\AjaxPostController');

//2nd CRUD Route

//--LOAD THE VIEW--//
Route::get('/laracrud', function () {
    $links = Link::all();
    return view('laracrud')->with('links', $links);
});
 
//--CREATE a link--//
Route::post('/links', function (Request $request) {
    $link = Link::create($request->all());
    return Response::json($link);
});
 
//--GET LINK TO EDIT--//
Route::get('/links/{link_id?}', function ($link_id) {
    $link = Link::find($link_id);
    return Response::json($link);
});
 
//--UPDATE a link--//
Route::put('/links/{link_id?}', function (Request $request, $link_id) {
    $link = Link::find($link_id);
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return Response::json($link);
});
 
//--DELETE a link--//
Route::delete('/links/{link_id?}', function ($link_id) {
    $link = Link::destroy($link_id);
    return Response::json($link);
});


////todo

Route::get('/todo_show', 'TodoController@show');
Route::get('/todo_delete/{id}', 'TodoController@destroy');
Route::get('/todo_create', 'TodoController@create');
Route::post('/todo_submit', 'TodoController@store');
Route::get('/todo_edit/{id}', 'TodoController@edit');
//Route::get('/todo_edit', 'TodoController@edit');
Route::post('/todo_update/{id}', 'TodoController@update')->name('todo.update');


///CURD P L e g o DAta

Route::get('/admin/create/agenda', 'AgendaController@createAgendaForm');
Route::post('/admin/create/agenda', 'AgendaController@createAgenda');
Route::get('/admin/edit/agenda', 'AgendaController@editAgendaForm');
Route::post('/admin/edit/agenda', 'AgendaController@editAgenda');
Route::post('/admin/delete/agenda', 'AgendaController@deleteAgenda');
Route::post('/admin/get/agenda', 'AgendaController@getAgendaData');


//Curd p i t h m 
Route::get('/refresh', 'FeeController@refresh');
Route::get('/addForm', 'FeeController@addForm');
Route::post('/add', 'FeeController@add');

Route::get('/editForm', 'FeeController@editForm');
Route::get('/deleteForm', 'FeeController@deleteForm');
Route::get('/rollbackForm', 'FeeController@rollbackForm');
