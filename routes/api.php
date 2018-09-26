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

Route::post('register', 'ApiController\AuthController@register');

Route::post('login', 'ApiController\AuthController@login');

Route::post('recover', 'ApiController\AuthController@recover');

Route::get('login', function(){
        return view('test_login');
    });

Route::group(['middleware' => ['jwt.auth']], function() {
    
    Route::get('logout', 'ApiController\AuthController@logout');
   
   //----------------RUTAS DE USUARIO------------------------------------------
    	
    	Route::get('User','ApiController\UserController@UserData');
    	Route::get('Referals','ApiController\UserController@WebsUser');
    	Route::post('UpdateData', 'ApiController\UserController@UpdateData');    	
   //-------------------------------------------------------------------------

    //-------------------------RUTAS DE PAQUETES--------------------------------
   		Route::get('Packages','ApiController\PackageController@ShowPackages');

   		//---------------------------COMPRAS DE PAQUETES--------------------------------------
	   		Route::post('BuyDepositPackage','ApiController\PackageController@BuyDepositPackage');
	   		Route::post('BuyPointsPackage','ApiController\PackageController@BuyPointsPackage');
	   		Route::post('BuyPayphone','ApiController\PackageController@BuyPayphonePackage');
   		//-----------------------------------------------------------------------------------

    //--------------------------------------------------------------------------
   
    //---------------Rutas de Contenido---------------------------------------

		Route::get('Singles','ApiController\ContentController@AllAprovedSingles');
		Route::get('Albums','ApiController\ContentController@AllAprovedAlbums');
		Route::get('MusicAuthors','ApiController\ContentController@AllAprovedMusicAuthors');
		Route::get('Books','ApiController\ContentController@AllAprovedBooks');
		Route::get('Megazines','ApiController\ContentController@AllAprovedMegazines');
		Route::get('Radios','ApiController\ContentController@AllAprovedRadios');
		Route::get('Tvs','ApiController\ContentController@AllAprovedTvs');

	//---------------------------------------------------------------------------

	//---------------Rutas de Contenido Especifico----------------------------------

		Route::get('Single/{id}','ApiController\ContentController@Single');
		Route::get('Megazine/{id}','ApiController\ContentController@Megazine');
		Route::get('Album/{id}','ApiController\ContentController@Album');
		Route::get('Book/{id}','ApiController\ContentController@Book');
		Route::get('MusicAuthor/{id}','ApiController\ContentController@MusicAuthor');
		Route::get('Radio/{id}','ApiController\ContentController@Radio');
		Route::get('Tv/{id}','ApiController\ContentController@Tv');

	//-------------------------------------------------------------------------------

});



