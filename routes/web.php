<?php

use Illuminate\Support\Facades\View;

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


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'WelcomeController@welcome');



/* ------------------------------------------------------------------
---------------------------------------------------------------------
---------                                              --------------
---------              RUTAS DE USUARIOS               --------------
---------                     Y                        --------------
---------               ADMINISTRADORES                --------------
---------                                              --------------
---------------------------------------------------------------------
---------------------------------------------------------------------
*/

Auth::routes();

Route::get('/register/{user_code}','UserController@show');
Route::post('SellerRegister','SellerController@CompleteRegistration');

//-----------------------Funciones del Homw---------------------------

Route::get('/home', 'HomeController@index');
Route::get('ContentGraph', 'HomeController@DataContentGraph');
Route::get('MyTickets/{id}', 'HomeController@MyTickets');
//Route::resource('App', 'TareasController');

//---------------------------------------------------------------------

Route::get('/login/{provider}', 'SocialAuthController@redirectToProvider');

Route::get('/login/{provider}/callback', 'SocialAuthController@handleProviderCallback');

Route::get('app', function () {
    return view('layouts.app');
});
Route::get('rigth', function () {
    return view('layouts.partials.siderRigth');
});


//-------------------Funciones del Usuarios----------------------------------

Route::post('BuySong/{id}','UserController@BuySingle');
Route::post('BuyAlbum/{id}','UserController@BuyAlbum');
Route::post('BuyBook/{id}','UserController@BuyBook');
Route::get('MyMusic','UserController@MyMusic');
Route::get('Read/{id}','UserController@SendRead');
Route::get('MyReads','UserController@ShowMyReadings');
Route::get('Read/{id}','UserController@SendRead');
Route::post('Invite','UserController@Invite');

    //Agregadas 4/7/18
    Route::get('EditProfile','UserController@edit');

    //Agregada 11/7/18
    Route::get('PlayList/{id}','UserController@AddElementPlaylist');

    //Agregada12/7/18
    Route::get('MyAlbums','UserController@MyAlbums');
    Route::get('SongsAlbums/{id}','UserController@SongAlbum');

    //Agregada 13/7/18 
    Route::get('MyMegazine','UserController@ShowMyReadingsMegazines');

    //Agregada 14/7/18
    Route::get('ShowMyReadBook/{id}','UserController@ShowMyReadBook');

    //Agregada 15/7/18
    Route::get('ShowMyReadMegazine/{id}','UserController@ShowMyReadMegazine');

    //Agregada 18/7/18
    Route::post('CompleteProfile','UserController@CompleteProfile');
    Route::post('Referals','UserController@referals');

    //Agregada 23/7/2018
    Route::get('MyMovies','UserController@MyMovies');
    Route::get('ShowMyMovie/{id}','UserController@ShowMyMovie');

    //Agregada 31/7/2018
    Route::get('/SearchArtist',array('as'=>'SearchArtist','uses'=>'ContentController@seachArtist'));

    //Agregada 3/8/2018
    Route::get('DownloadQr','UserController@qrDownload');

     //Agregada 8/8/2018
    Route::get('/SearchAuthor',array('as'=>'SearchAuthor','uses'=>'ContentController@seachAuthor'));


//---------------------------------------------------------------------------

//______________________Funiciones de Contenido______________________________

Route::get('MusicContent','ContentController@ShowMusic');
Route::get('AllSingles','ContentController@ShowAllSingles');
Route::get('AllAlbums','ContentController@ShowAllAlbum');
Route::get('ProfileMusicArtist/{id}','ContentController@ShowArtist');
Route::get('ReadingsBooks','ContentController@ShowReadingsBooks');
Route::get('ReadingsMegazines','ContentController@ShowReadingsMegazines');

//Agrega 3/8/2018
    Route::post('SearchProfileArtist','ContentController@ShowProfileArtist');
//Agregada 09/8/2018
    Route::post('SearchProfileAuthor','ContentController@ShowProfileAuthor');
    Route::get('ProfileBookAuthor/{id}','ContentController@ShowAuthor');

//---------------------------------------------------------------------------


//-------------------------Funiciones de Referidos---------------------------

Route::get('WebsUser','ReferalsController@ShowWebs');
Route::get('Referals','ReferalsController@ShowReferals');

//---------------------------------------------------------------------------


/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ RUTAS ADMIN CONTENIDO MUSICAL--------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/
Route::get('/admin','AdminController@index');

Route::get('/admin_albums','AdminController@ShowAlbums');
Route::get('/AllAdminAlbum','AdminController@ShowAllAlbums');

Route::get('/admin_songs/{id}','AdminController@AlbumSongs');
Route::post('/admin_album/{id}','AdminController@AlbumStatus');

Route::get('/admin_single','AdminController@ShowSingles');
Route::get('/AllAdminSingles','AdminController@ShowAllSingles');
Route::post('/admin_single/{id}','AdminController@SingleStatus');

Route::get('/admin_musician','AdminController@ShowMusician');
Route::get('/AllAdminMusician','AdminController@ShowAllMusician');
Route::post('/admin_musician/{id}','AdminController@MusicianStatus');




/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ FIN DE LAS RUTAS ADMIN CONTENIDO MUSICAL---------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/



/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ RUTAS ADMIN RADIOS------------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


Route::get('/admin_radio','AdminController@ShowRadios');
Route::get('/AllAdminRadio','AdminController@ShowAllRadios');
Route::post('/admin_radio/{id}','AdminController@RadioStatus');



/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ FIN DE LAS RUTAS ADMIN RADIOS-------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/



/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ RUTAS ADMIN TV----------------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


Route::get('/admin_tv','AdminController@ShowTV');
Route::get('/AllAdminTv','AdminController@ShowAllTV');
Route::post('/admin_tv/{id}','AdminController@TvStatus');



/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ FIN DE LAS RUTAS ADMIN TV-------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ RUTAS ADMIN MOVIES----------------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/

Route::get('/admin_movie',[
    'uses'  =>  'AdminController@showMovie',
    'as'    =>  'admin_showMovies'
]);
Route::get('/admin_AllMovies',[
    'uses'  =>  'AdminController@showAllMovie',
    'as'    =>  'admin_allMovies'
]);
Route::post('/admin_movie/{id}',[
    'uses'  =>  'AdminController@movieStatus',
    'as'    =>  'admin_authorStatus'
]);

/*------------------------------------------------------------------
--------------------------------------------------------------------
------------ FIN DE LAS RUTAS ADMIN MOVIES -------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


/*------------------------------------------------------------------
--------------------------------------------------------------------
------------ RUTAS ADMIN AUTOR -------------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/

Route::get('/admin_author',[
    'uses'  =>  'AdminController@showAuthor',
    'as'    =>  'admin_showAuthor'
]);  //falta terminar
Route::get('/admin_allAuthor',[
    'uses'  =>  'AdminController@showAllAuthor',
    'as'    =>  'admin_allAuthors'
]);  //falta terminar
Route::post('/admin_author/{id}',[
    'uses'  =>  'AdminController@authorStatus',
    'as'    =>  'admin_authorStatus'
]); //falta terminar

/*------------------------------------------------------------------
--------------------------------------------------------------------
------------ FIN DE LAS RUTAS ADMIN AUTOR --------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/




/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ RUTAS DE REVISTAS---------------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


Route::get('/admin_chain','AdminController@ShowPublicationChain');
Route::get('/AllAdminMegazinesChain','AdminController@ShowAllPublicationChain');

Route::post('/admin_chain/{id}','AdminController@PublicationChainStatus');

Route::get('/admin_megazine','AdminController@ShowMegazine');
Route::get('/AllAdminMegazines','AdminController@ShowAllMegazine');

Route::post('/admin_megazine/{id}','AdminController@MegazineStatus');



/*------------------------------------------------------------------
-------------------------------------------------------------------
------------ FIN DE LAS DE REVISTAS-------------------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


/*------------------------------------------------------------------
--------------------------------------------------------------------
------------------ RUTAS DE MANEJO DE PROMOTORES  ------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


Route::post('/promoter_c','AdminController@CreatePromoter');

Route::get('/promoter_delete/{id}','AdminController@DeletePromoter');






/*------------------------------------------------------------------
--------------------------------------------------------------------
--------------- FIN RUTAS DE MANEJO DE PROMOTORES  -----------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/



/*------------------------------------------------------------------
--------------------------------------------------------------------
--------------- Inicio RUTAS DE MANEJO DE SOLICITUDES -----------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/






/*------------------------------------------------------------------
--------------------------------------------------------------------
--------------- FIN RUTAS DE MANEJO DE SOLICITUDES -----------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/




/*------------------------------------------------------------------
--------------------------------------------------------------------
------------ FIN DE LAS RUTAS DE USUARIOS O ADMIN ------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/






/* ------------------------------------------------------------------
---------------------------------------------------------------------
---------                                              --------------
---------              RUTAS DE PROMOTORES             --------------
---------                                              --------------
---------                                              --------------
---------                                              --------------
---------------------------------------------------------------------
---------------------------------------------------------------------
*/
Route::group(['middleware' => 'promoter_guest'], function() {



Route::get('promoter_login', 'PromoterAuth\LoginController@showLoginForm');

Route::post('promoter_login', 'PromoterAuth\LoginController@login');

});

Route::group(['middleware' => 'promoter_auth'], function(){

    Route::post('promoter_logout', 'PromoterAuth\LoginController@logout');

    Route::get('/promoter_home','PromoterController@index');

  
   Route::group(['middleware' => ['Admin']], function (){

            Route::get('/admin_sellers','AdminController@ShowSellers');

            Route::get('/admin_modules/{id_seller}/{id_module}','AdminController@DeleteModule');

            Route::post('admin_add_module/{id}','AdminController@AddModule');

            Route::post('SellerAddPromoter/{id}','AdminController@AddPromoterToSeller');

            Route::get('RemovePromoterFromSeller/{id_seller}/{id_promoter}','AdminController@RemovePromoterFromSeller');

            Route::post('AproveOrDenialSeller/{id_seller}','AdminController@AproveOrDenialSeller');

            Route::get('BackendUsers','AdminController@ShowBackendUsers');
            
   });
    
       
        Route::group(['middleware' => ['Operator']], function (){

            Route::get('/admin_applys','AdminController@ShowApplys');

            Route::post('/add_salesman_to/{id}','AdminController@AddSalesmanToApllys');

            Route::get('/delete_promoter_from/{id_apply}/{id_promoter}','AdminController@DeleteSalesmanFromApllys');
            
            Route::post('AdminAproveOrDenialApplys/{id}','AdminController@StatusApllys');

            Route::get('/delete_applys_from/{promoter}/{applys}','AdminController@DeleteApplysFromPromoter');

        });

});

/*------------------------------------------------------------------
--------------------------------------------------------------------
------------ FIN DE LAS RUTAS DE PROMOTORES------ ------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/
















/* ------------------------------------------------------------------
---------------------------------------------------------------------
---------                                              --------------
---------              RUTAS DE SELLERS                --------------
---------                     O                        --------------
---------                PRODUCTORAS                   --------------
---------                                              --------------
---------------------------------------------------------------------
---------------------------------------------------------------------
*/


/*------------------------------------------------------------------
--------------------------------------------------------------------
---------------                                    -----------------
---------------       MIDDLEWARE DE INVITADO       -----------------
---------------                                    -----------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/

Route::group(['middleware' => 'seller_guest'], function () {

    Route::get('seller_complete_f/{id}/{code}', 'SellerController@CompleteRegistrationForm');

    Route::post('seller_register', 'SellerAuth\RegisterController@register');

    Route::get('applys', 'ApplysController@ShowApplysForm');

    Route::post('ApplysSubmit', 'ApplysController@SubmitApp');

    Route::get('seller_login', 'SellerAuth\LoginController@showLoginForm');

    Route::post('seller_login', 'SellerAuth\LoginController@login');

//------------------RUTAS DE OLVIDO SU CONTRASEÑA-------------------

    Route::get('seller_password/reset', 'SellerAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('seller_password/email', 'SellerAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('seller_password/reset/{token}', 'SellerAuth\ResetPasswordController@showResetForm');
    Route::post('seller_password/reset', 'SellerAuth\ResetPasswordController@reset');

//-------------FIN DE LAS RUTAS DE OLVIDO SU CONTRASEÑA-------------

});


/*------------------------------------------------------------------
-------------------------------------------------------------------
-------------  FIN DEL MIDDLEWARE DE INVITADO  ---------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


/*------------------------------------------------------------------
--------------------------------------------------------------------
---------------                                    -----------------
---------------       MIDDLEWARE DE LOGGEADO       -----------------
---------------                                    -----------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/


//Solo Productoras Logueadas pueden acceder a las siguientes rutas

Route::group(['middleware' => 'seller_auth'], function () {

    Route::post('seller_logout', 'SellerAuth\LoginController@logout');

    Route::get('messages','SellerController@ShowMessages');

    Route::post('/seller_complete', 'SellerController@CompleteRegistration');

    Route::resource('sellers', 'SellerController');


    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                   -----------------------
    -----------------               DEL                    -----------------------
    -----------------          MODULO DE MUSICA            ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


    /*---------- Registrar Artistas o Grupos Musicales ------------*/
    Route::post('/save_artist', 'ArtistController@CreateArtist');
    Route::get('/artist_form', 'ArtistController@ShowArtistForms');
    /*------------------------------------------------------------*/

    /*---------- Registrar Albums -------------------------------*/
    Route::post('/albums', 'AlbumsController@CreateAlbum');
    Route::get('/albums', 'AlbumsController@ShowAlbumstForms');
    /*------------------------------------------------------------*/

    /*------------------Modificar Albums -------------------------- */
    Route::get('/modify_album/{id}', 'AlbumsController@ModifyAlbum');
    Route::post('/modify_album/{id}', 'AlbumsController@UpdateAlbum');
    /*--------------------------------------------------------------*/

    /*------------------Borrar Albums-------------------------------*/
    Route::get('/delete_album/{id}', 'AlbumsController@DeleteAlbum');
    /*--------------------------------------------------------------*/

    /*------------------Mostrar Albums- ----------------------------*/
    Route::get('/show_album/{id}', 'AlbumsController@ShowAlbum');
    /*--------------------------------------------------------------*/


    /*---------- Registrar Singles -------------------------------*/
    Route::post('/single_registration', 'AlbumsController@SongConfig');
    Route::get('/single_registration', 'AlbumsController@ShowSingleForms');
    /*--------------------------------------------------------*/

    /*------------------Borrar Single-------------------------------*/
    Route::get('/delete_song/{id}', 'AlbumsController@DeleteSong');
    /*--------------------------------------------------------------*/

    /*------------------Modificar Single -------------------------- */
    Route::get('/modify_single/{id}', 'AlbumsController@ModifySong');
    Route::post('/modify_single/{id}', 'AlbumsController@UpdateSong');
    /*--------------------------------------------------------------*/

    /*--------------Panel de "Mi Contenido Musical"---------------- */
    Route::get('/my_music_panel/{id}', 'MusicController@ShowMusicPanel');
    /*--------------------------------------------------------------*/

    /*--------------AJAX de Guardar Etiquetas---------------------- */
    Route::post('/tagMusic', 'AlbumsController@SaveTag');
    /*--------------------------------------------------------------*/


    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          MUSICA                -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
  ------------------------------------------------------------------------------
  ------------------------------------------------------------------------------
  -----------------              RUTAS                   -----------------------
  -----------------               DEL                    -----------------------
  -----------------          MODULO DE SERIES            ----------------------
  -----------------------------------------------------------------------------
  -----------------------------------------------------------------------------
  ----------------------------------------------------------------------------*/


    Route::resource('series', 'SeriesController');

    //para q guarde el modal
    Route::post('sagas/registerS', [
        'uses' => 'SagaController@registerSeries',
        'as' => 'sagas.registerS'
    ]);

    Route::get('series/{id}/destroy', [
        'uses' => 'SeriesController@destroy',
        'as' => 'series.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          SERIES                -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/




    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                   -----------------------
    -----------------               DEL                    -----------------------
    -----------------          MODULO DE RADIOS            ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


    Route::resource('radios', 'RadiosController');

    Route::get('radios/{id}/destroy', [
        'uses' => 'RadiosController@destroy',
        'as' => 'radios.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          RADIOS                -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                   -----------------------
    -----------------               DEL                    -----------------------
    -----------------          MODULO DE TVS                ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/

    Route::resource('tvs', 'TVController');

    Route::get('tvs/{id}/destroy', [
        'uses' => 'TVController@destroy',
        'as' => 'tvs.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          TVS                   -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                   -----------------------
    -----------------               DEL                    -----------------------
    -----------------          MODULO DE REVISTAS          ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


//------------Rutas de "Agregar Revista a Cadena de Publicaciones"------------
    Route::get('/megazine_form', 'MegazineController@ShowMegazineForm');
    Route::post('/megazine_save', 'MegazineController@AddMegazine');
//-------------Fin de las Rutas-----------------------------------------------

//------------Rutas de "Crear Cadena de Publicaciones"------------
    Route::get('/type', 'MegazineController@ShowPTypeForm');
    Route::post('/type', 'MegazineController@AddPType');
//-------------Fin de las Rutas-----------------------------------------------

//------------Rutas de Registrar Revista Independiente----------------------
    Route::get('/megazine_i', 'MegazineController@ShowSingleMegazineForm');
    Route::post('/megazine_i', 'MegazineController@AddMegazineI');
//-----------Fin de las Rutas-----------------------------------------------

//------------Rutas de Modificar "Revista a Cadena de Publicaciones"------------
    Route::get('/megazine_update/{id}', 'MegazineController@ShowUpdateMegazineForm');
    Route::post('/megazine_update/{id}', 'MegazineController@UpdateMegazine');
//-------------Fin de las Rutas-----------------------------------------------

//------------Rutas de Modificar "Cadena de Publicaciones"------------
    Route::get('/type_update/{id}', 'MegazineController@ShowUpdatePTypeForm');
    Route::post('/type_update/{id}', 'MegazineController@UpdatePType');
//-------------Fin de las Rutas-----------------------------------------------

//------------Rutas de Modificar Revista Independiente----------------------------
    Route::get('/megazine_i_update/{id}', 'MegazineController@ShowUpdateSingleMegazineForm');
    Route::post('/megazine_i_update/{id}', 'MegazineController@UpdateIdMegazine');
//-----------Fin de las Rutas-----------------------------------------------------

//------------Rutas de Borrar Revistas ----------------------------
    Route::get('/delete_megazine/{id}', 'MegazineController@DeleteMegazine');
//-----------Fin de las Rutas-----------------------------------------------------


//------------Rutas de Borrar Cadenas de Publicacion ----------------------------
    Route::get('/type_delete/{id}', 'MegazineController@DeleteType');
//-----------Fin de las Rutas-----------------------------------------------------

//-----------Mostrar Cadenas de Publicaion-----------------------------------------
    Route::get('/show_pub/{id}', 'MegazineController@ShowType');
//------------------------------------------------------------------------------

//-----------Mostrar Revista-----------------------------------------
    Route::get('/show_megazine/{id}', 'MegazineController@ShowMegazine');
//-------------------------------------------------------------------------------

//-----------Panel de Mis Revistas ------------------------------------------------------------
    Route::get('/my_megazine/{id}', 'MegazineController@MyMegazine');
//-------------------------------------------------------------------------------

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          REVISTAS              -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                   -----------------------
    -----------------               DEL                    -----------------------
    -----------------          MODULO DE LIBROS            ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


    Route::resource('tbook', 'BooksController');
    Route::get('tbook/{id}/destroy',[
        'uses' => 'BooksController@destroy',
        'as' => 'tbook.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          LIBROS                -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
------------------------------------------------------------------------------
------------------------------------------------------------------------------
-----------------              RUTAS                   -----------------------
-----------------               DEL                    -----------------------
-----------------          MODULO DE SAGA            ----------------------
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
----------------------------------------------------------------------------*/


    Route::resource('sagas', 'SagaController');
    //para q guarde el modal
    Route::post('sagas/register', [
        'uses' => 'SagaController@register',
        'as' => 'sagas.register'
    ]);
    Route::get('saga/{id}/destroy', [
        'uses' => 'SagaController@destroy',
        'as' => 'sagas.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          SAGA                -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/



    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    -----------------              RUTAS                  -----------------------
    -----------------               DEL                   -----------------------
    -----------------          MODULO DE PELICULA          ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


    Route::resource('movies', 'MoviesController');
    //para q guarde el modal
//    Route::post('movies/register', [
//        'uses' => 'SagaController@register',
//        'as' => 'sagas.register'
//    ]);
    Route::get('movies/{id}/destroy', [
        'uses' => 'MoviesController@destroy',
        'as' => 'movies.destroy'
    ]);

    /*-------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------
    --------------------                                -----------------------
    --------------------           FIN                  -----------------------
    --------------------        DEL MODULO              -----------------------
    --------------------          PELICULA              -----------------------
    ---------------------------------------------------------------------------
    ---------------------------------------------------------------------------*/


    /*----------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    ------------------------------------------------------------------------------
    -----------------              RUTAS                  -----------------------
    -----------------               DEL                   -----------------------
    -----------------          MODULO DE AUTORES           ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/
   
    Route::resource('authors_books', 'BooksAuthorsController');
    //para q guarde el modal
    Route::post('authors_books/register', [
        'uses' => 'BooksAuthorsController@register',
        'as' => 'authors_books.register'
    ]);
    Route::get('authors_books/{id}/destroy', [
        'uses' => 'BooksAuthorsController@destroy',
        'as' => 'authors_books.destroy'
    ]);

    /*---------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    -----------------              RUTAS                  -----------------------
    -----------------               DEL                   -----------------------
    -----------------               FIN                   -----------------------
    -----------------          MODULO DE AUTORES           ----------------------
    -----------------------------------------------------------------------------
    -----------------------------------------------------------------------------
    ----------------------------------------------------------------------------*/


    Route::get('/Series', 'SellerController@CompleteRegistrationForm');


//----------------------------------------------------------------------
//-----------Funcion encargada de determinar ---------------------------
//-----------el acceso a los modulos del sistema----------------------- 
//-----------y Setear Las variabels en la Vista------------------------
//----------------------------------------------------------------------


    Route::get('/seller_home','SellerController@homeSeller');





});

/*------------------------------------------------------------------
--------------------------------------------------------------------
-------------  FIN DEL MIDDLEWARE DE LOGGEADO  ---------------------
--------------------------------------------------------------------
--------------------------------------------------------------------
*/
