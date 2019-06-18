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
 
Route::group(['middleware' => ['cors']], function() {
    Route::post('register', 'ApiController\AuthController@register');
    
    Route::post('login', 'ApiController\AuthController@login');

    Route::post('refresh', 'ApiController\AuthController@refresh');
    
    Route::post('ExternalPayment', 'ApiController\ExternalOperationsController@PointsPayment');
    
    Route::get('ExternalPaymentTest', 'ApiController\ExternalOperationsController@test');
    
    Route::post('recover', 'ApiController\AuthController@recover');
    
    Route::get('login/{provider}', 'ApiController\AuthController@redirectToProvider');
    
    Route::post('login/social', 'ApiController\AuthController@AuthSocialUser');
    
    Route::get('login', function(){
        return view('test_login');
    });
    /*Ruta de prueba*/
    Route::get('rutaApiPrueba','ApiController\ContentController@test');

    /*----------------------------RUTAS PARA USUARIOS LOGUEADOS----------------------------*/
    Route::group(['middleware' => ['jwt.auth']], function() {

        //Route::get('logout', 'ApiController\AuthController@logout');

        //----------------RUTAS DE USUARIO------------------------------------------

        Route::get('user','ApiController\UserController@UserData');
        Route::get('referals','ApiController\UserController@WebsUser');
        Route::post('updateData','ApiController\UserController@UpdateData');
        Route::post('uploadDocument','ApiController\UserController@UploadDocument');
        Route::post('uploadAvatar','ApiController\UserController@UploadAvatar');
        Route::get('MyContent','ApiController\UserController@MyContent');
        Route::get('valSponsor','ApiController\UserController@valSponsor');
        Route::get('whoSponsor/{code}','ApiController\UserController@whoSponsor');
        Route::post('addSponsor','ApiController\UserController@addSponsor');
        Route::get('invite','ApiController\UserController@invite');
        Route::post('invite','ApiController\UserController@inviteByEmail');

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

        Route::get('billboard','ApiController\ContentController@billboard');

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

        //---------------Rutas de Contenido Especifico----------------------------------

        Route::post('RadioTrace/{id}','ApiController\ContentController@RadioTrace');
        Route::post('TvTrace/{id}','ApiController\ContentController@TvTrace');

        //-------------------------------------------------------------------------------

    });
    /*----------------------------RUTAS PARA USUARIOS LOGUEADOS----------------------------*/
});