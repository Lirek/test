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
        //-----------------------------------------------------------------------------------
        //-------------------------RUTAS DE USUARIO------------------------------------------
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
        //-------------------------RUTAS DE USUARIO------------------------------------------
        //-------------------------------------------------------------------------

        //-------------------------------------------------------------------------
        //-------------------------RUTAS DE PAQUETES--------------------------------
        Route::get('packages','ApiController\PackageController@ShowPackages');
        //-----------------------------------------------------------------------------------
        //---------------------------COMPRAS DE PAQUETES--------------------------------------
        Route::post('BuyDepositPackage','ApiController\PackageController@BuyDepositPackage');
        Route::post('BuyPointsPackage','ApiController\PackageController@BuyPointsPackage');
        Route::post('BuyPayphone','ApiController\PackageController@BuyPayphonePackage');

        //Route::post('BuyDepositPackage','ApiController\PaymentController@BuyDepositPackage');
        Route::post('BuyDepositPackageDocument/{idPayment}','ApiController\PaymentController@BuyDepositPackageDocument');
        //Route::post('BuyPointsPackage','ApiController\PaymentController@BuyPointsPackage');
        //Route::post('BuyPayphone','ApiController\PackageController@BuyPayphonePackage');
        Route::get('BuyPayphone/{id}/{cost}/{value}','ApiController\PaymentController@BuyPayphone');
        Route::get('factura/{id}/{medio}','ApiController\PaymentController@factura');
        Route::get('TransactionApproved/{id}/{reference}/{ticket}/{idFactura}','ApiController\PaymentController@TransactionApproved');
        Route::get('TransactionCanceled/{id}/{reference}','ApiController\PaymentController@TransactionCanceled');
        //---------------------------COMPRAS DE PAQUETES--------------------------------------
        //-----------------------------------------------------------------------------------
        //-------------------------RUTAS DE PAQUETES--------------------------------
        //-----------------------------------------------------------------------------------

        //--------------------------------------------------------------------------
        //---------------Rutas de Contenido---------------------------------------
        Route::get('billboard','ApiController\ContentController@billboard');
        //--------------------------------------------------------------------------
        Route::get('music','ApiController\ContentController@music');
        Route::get('reading','ApiController\ContentController@reading');
        Route::get('movie','ApiController\ContentController@movies');
        Route::get('radio','ApiController\ContentController@AllAprovedRadios');
        Route::get('tvs','ApiController\ContentController@AllAprovedTvs');
        //---------------------------------------------------------------------------
        //---------------Rutas de Contenido Especifico----------------------------------
        Route::get('single/{id}','ApiController\ContentController@Single');
        Route::get('album/{id}','ApiController\ContentController@Album');
        Route::get('megazine/{id}','ApiController\ContentController@Megazine');
        Route::get('book/{id}','ApiController\ContentController@Book');
        Route::get('movie/{id}','ApiController\ContentController@movie');
        Route::get('serie/{id}','ApiController\ContentController@serie');
        Route::get('radio/{id}','ApiController\ContentController@Radio');
        Route::get('tv/{id}','ApiController\ContentController@Tv');
        //---------------Rutas de Contenido Especifico----------------------------------
        //-------------------------------------------------------------------------------

        //--------------------------Rutas de Beneficios----------------------------------
        Route::get('benefit','ApiController\BenefitController@index');
        Route::post('benefit','ApiController\BenefitController@buy');
        Route::get('confirmBuy/{id}','ApiController\BenefitController@confirm');
        Route::get('delivered/{id}','ApiController\BenefitController@delivered');
        //--------------------------Rutas de Beneficios----------------------------------
        //-------------------------------------------------------------------------------

    });
    /*----------------------------RUTAS PARA USUARIOS LOGUEADOS----------------------------*/
});