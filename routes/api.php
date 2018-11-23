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

Route::get('login/{provider}', 'ApiController\AuthController@redirectToProvider');

Route::post('login/social', 'ApiController\AuthController@AuthSocialUser');

Route::get('login', function(){
    return view('test_login');
});

Route::group(['middleware' => ['jwt.auth']], function() {

    Route::get('logout', 'ApiController\AuthController@logout');

    //----------------RUTAS DE USUARIO------------------------------------------

    Route::get('User','ApiController\UserController@UserData');
    Route::get('Referals','ApiController\UserController@WebsUser');
    Route::post('UpdateData', 'ApiController\UserController@UpdateData');
    Route::post('UploadDocument', 'ApiController\UserController@UploadDocument');
    Route::post('UploadAvatar', 'ApiController\UserController@UploadAvatar');

    //-------------------------------------------------------------------------

    //-------------------------RUTAS DE PAQUETES--------------------------------
    Route::get('Packages','ApiController\PackageController@ShowPackages');

    //---------------------------COMPRAS DE PAQUETES--------------------------------------
    Route::post('BuyDepositPackage','ApiController\PackageController@BuyDepositPackage');
    Route::post('BuyPointsPackage','ApiController\PaymentController@BuyPointsPackage');
    //Route::post('BuyPayphone','ApiController\PackageController@BuyPayphonePackage');
    Route::get('BuyPayphone/{id}/{cost}/{value}','ApiController\PaymentController@BuyPayphone');
    Route::get('factura/{id}/{medio}','ApiController\PaymentController@factura');
    Route::get('TransactionApproved/{id}/{reference}/{ticket}/{idFactura}','ApiController\PaymentController@TransactionApproved');
    Route::get('TransactionCanceled/{id}/{reference}','ApiController\PaymentController@TransactionCanceled');
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

    //---------------Rutas de Contenido Especifico----------------------------------

    Route::post('RadioTrace/{id}','ApiController\ContentController@RadioTrace');
    Route::post('TvTrace/{id}','ApiController\ContentController@TvTrace');

    //-------------------------------------------------------------------------------

    //-------------------------RUTA DE CONTENIDOS DESTACADOS--------------------------------
    Route::get('contenidoDestacado','ApiController\ContentController@contenidoDestacado');
    //-------------------------RUTA DE CONTENIDOS DESTACADOS--------------------------------

});