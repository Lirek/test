<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});

//---------------Rutas de Contenido---------------------------------------

Route::get('Singles','ApiController\ContentController@AllAprovedSingles');
Route::get('Albums','ApiController\ContentController@AllAprovedAlbums');
Route::get('MusicAuthors','ApiController\ContentController@AllAprovedMusicAuthors');
Route::get('Books','ApiController\ContentController@AllAprovedBooks');
Route::get('Megazines','ApiController\ContentController@AllAprovedMegazines');
//---------------------------------------------------------------------------

//---------------Rutas de Contenido Especifico----------------------------------

Route::get('Single/{id}','ApiController\ContentController@Single');
Route::get('Megazine/{id}','ApiController\ContentController@Megazine');
Route::get('Album/{id}','ApiController\ContentController@Album');
Route::get('Book/{id}','ApiController\ContentController@Book');
Route::get('MusicAuthor/{id}','ApiController\ContentController@MusicAuthor');

//-------------------------------------------------------------------------------
