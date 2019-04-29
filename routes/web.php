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

// Agregadas 01-10-2018
Route::get('indexRadio', 'WelcomeController@indexRadio');
Route::get('indexTv', 'WelcomeController@indexTv');

//Route::get('Test','AdminController@test');

//Route::get('test/{cod}','HomeController@validarPatrocinador');
//Route::get('pruebaPuntos','HomeController@pruebaPuntos');


// terminos y condiciones
Route::get('terminosCondiciones', [
    'uses' => 'WelcomeController@terminosYcondiciones',
    'as'   => 'terminosCondiciones'
]);

// que es leipel
Route::get('queEsLeipel', [
    'uses' => 'WelcomeController@leipel',
    'as'   => 'queEsLeipel'
]);




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

//Route::post('login', 'Auth\LoginController@login');


Route::get('/register/{user_code}','UserController@show');
Route::post('SellerRegister','SellerController@CompleteRegistration');
//---------------------------------------------------------------------

Route::get('/login/{provider}', 'SocialAuthController@redirectToProvider');

Route::get('/login/{provider}/callback', 'SocialAuthController@handleProviderCallback');

Route::resource('users', 'UserController');

//agregada 27-11-2018
Route::get('BalanceUserGraph','UserController@DonutGraph');

Route::post('EmailValidate','ReferalsController@email');
Route::post('RegisterEmail','WelcomeController@email');
Route::post('RegisterEmailSeller','WelcomeController@emailSeller');

////Validación de correo siendo verificado
//Route::post('RegisterApplysEmailSeller','WelcomeController@applyEmailSeller');

//----------------------- Rutas para el usuario OFERTANTE -----------------------
    Route::post('BidderSubmit','BidderController@store');
    Route::get('RegisterEmailBidder/{email}','BidderController@valEmailBidder');
//----------------------- Rutas para el usuario OFERTANTE -----------------------


Route::group(['middleware' => ['auth','ActiveUser']], function() {

//-----------------------Funciones del Home---------------------------

    Route::get('/home', 'HomeController@index');
    Route::get('ContentGraph', 'HomeController@DataContentGraph');
    Route::get('MyTickets/{id}', 'HomeController@MyTickets');
    //Agregada 17/08/18
    Route::get('SaleTickets','HomeController@SaleTickets');
    Route::post('BuyPlan','HomeController@BuyPlan');
    Route::get('BuyPayphone/{id}/{cost}/{value}','HomeController@BuyPayphone');
    Route::post('BuyPuntos','HomeController@BuyPoints');
    // agregadas por Pacheco
    Route::get('TransactionCanceled/{id}/{reference}','HomeController@TransactionCanceled');
    Route::get('TransactionApproved/{id}/{reference}/{ticket}/{idFactura}','HomeController@TransactionApproved');
    //Route::get('TransactionPending/{id}/{reference}','HomeController@TransactionPending');
    Route::get('factura/{id}/{medio}','HomeController@factura');
    // agregada 30-09-2018
    Route::get('generarFactura/{idFactura}/{id_payments}','HomeController@generarFactura');
    Route::get('sponsor/{cod}','HomeController@sponsor');
    // agregada Alexis 15/01/2019
    Route::get('/Beneficios/{status}','HomeController@Beneficios');
    Route::post('BuyBenefi','HomeController@BuyBenefi');
    Route::get('verifyBenefi/{id}','HomeController@verifyBenefi');


//-------------------Funciones del Usuarios----------------------------------

Route::post('BuySong/{id}','UserController@BuySingle');
Route::post('BuyAlbum/{id}','UserController@BuyAlbum');
Route::post('BuyBook/{id}','UserController@BuyBook');
Route::post('BuyMagazines/{id}','UserController@BuyMagazines');
Route::post('BuyMovie/{id}','UserController@BuyMovie');
Route::post('BuySerie/{id}','UserController@BuySerie');
Route::post('BuyEpisode/{id}','UserController@BuyEpisode');
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
    Route::get('MyAlbums/{id}','UserController@MyAlbums');
    Route::get('MySingles/{id}','UserController@MySingles');
    Route::get('MySongsAlbums/{id}','UserController@SongAlbum');
    Route::get('SongsSingles','UserController@SongSingles');

    //Agregada 13/7/18
    Route::get('MyMegazine','UserController@ShowMyReadingsMegazines');

    //Agregada 14/7/18
    // Route::get('ShowMyReadBook/{id}','UserController@ShowMyReadBook')->middleware('MyBooks');
    Route::get('ShowMyReadBook/{id}','UserController@ShowMyReadBook');

    //Agregada Alexis 28/03/2019
    Route::get('ReadBook/{id}','UserController@ReadBook')->middleware('MyBooks');

    //Agregada 15/7/18
    // Route::get('ShowMyReadMegazine/{id}','UserController@ShowMyReadMegazine')->middleware('MyMegazine');
    Route::get('ShowMyReadMegazine/{id}','UserController@ShowMyReadMegazine');

    //Agregada 18/7/18
    Route::post('CompleteProfile','UserController@CompleteProfile');
    Route::post('Referals','UserController@referals');

    //Agregada 23/7/2018
    Route::get('MyMovies','UserController@MyMovies');
    Route::get('ShowMyMovie/{id}','UserController@ShowMyMovie')->middleware('MyMovies');

    //Agregada 31/7/2018
    Route::get('/SearchArtist',array('as'=>'SearchArtist','uses'=>'ContentController@seachArtist'));

    //Agregada 3/8/2018
    Route::get('DownloadQr','UserController@qrDownload');

     //Agregada 8/8/2018
    Route::get('/SearchAuthor',array('as'=>'SearchAuthor','uses'=>'ContentController@seachAuthor'));
    Route::get('/SearchMegazine',array('as'=>'SearchMegazine','uses'=>'ContentController@seachMegazines'));


    //Agregada 8/8/2018
    Route::get('MyBalance','UserController@balance');

    //Agregada 10/12/2019
     Route::get('MySeries','UserController@MySeries');
      Route::get('ShowMySerie/{id}/{type}','UserController@ShowMySerie');

    //Agregada 23/01/2019  
    Route::get('DeleteAccount/{id}','UserController@closed');

    //Agregada 28/01/2019
    Route::post('ChangePassword/{id}','UserController@changepassword');


   

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
//Agregada 16/8/18
    Route::get('ShowRadio','ContentController@ShowRadio');
    Route::get('ListenRadio/{id}','ContentController@ListenRadio');
    Route::get('/SearchRadio',array('as'=>'SearchRadio','uses'=>'ContentController@seachRadio'));
    Route::post('SearchListenRadio','ContentController@ShowListenRadio');
//Agregada 21/08/2018
    Route::get('ShowMovies','ContentController@ShowMovies');
    Route::get('/SearchMovie',array('as'=>'SearchMovie','uses'=>'ContentController@seachMovie'));
    Route::post('SearchMovieList','ContentController@ShowMovieSeach');
    Route::get('ShowMovies/{id}','ContentController@MovieList');
//Agregada 24/08/2018
    Route::get('ShowTv','ContentController@Showtv');
    
//Agregada 23/02/2019
    Route::get('PlayMovie/{id}','ContentController@PlayMovie');
    Route::get('PlaySerie/{id}','ContentController@PlaySerie');
    Route::get('PlayEpisode/{id}','ContentController@PlayEpisode');
    
    
    Route::get('PlayTv/{id}','ContentController@PlayTv');
    Route::get('/SearchTv',array('as'=>'SearchTv','uses'=>'ContentController@seachTv'));
    Route::post('SearchPlayTv','ContentController@ShowPlayTv');
//Agregada 6/11/2018
    Route::post('SearchProfileMegazine','ContentController@ShowProfileMegazine');
//Agregadas 6/12/2018
    Route::get('ShowSeries','ContentController@ShowSeries');
    Route::get('/SearchSerie',array('as'=>'SearchSerie','uses'=>'ContentController@seachSerie'));
    Route::post('SearchSerieList','ContentController@ShowSerieSeach');
// Agregada 04-02-2019
    Route::get('SerieList/{id}','ContentController@SerieList');
//---------------------------------------------------------------------------


//-------------------------Funiciones de Referidos---------------------------

    Route::get('WebsUser','ReferalsController@ShowWebs');
    Route::get('Referals','ReferalsController@ShowReferals');

//-----------------------Funciones de Pago Externo a la plataforma ------------------------
    Route::post('ExternalPayment','ExternalOperationsController@ShowPaymentForm');
    Route::post('ProcessPayment','ExternalOperationsController@ProcessPayment');
//-----------------------------------------------------------------------------------------
 });

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
            //Route::get('/AproveOrDenialSeller','AdminController@ShowSellers');
            Route::get('/SellerDataTable','AdminController@SellerDataTable');

            /*
            Rutas para canje de tickets a dinero
            Agregada 26-10-2018
            */
            Route::get('/admin_sellers_payments','AdminController@ShowPaymentsSellers');
            Route::get('/PaymentsDataTable/{status}','AdminController@PaymentsDataTable');
            Route::post('admin_payments/{id}','AdminController@admin_payments');
            Route::get('/infoSeller/{idSeller}','AdminController@infoSeller');
            // Agregada el 18-12-2018
            Route::get('/admin_clients_payments','AdminController@ShowPaymentsClients');
            Route::get('/paymentsClients/{status}','AdminController@paymentsClients');
            /*
            Rutas para canje de tickets a dinero
            Agregada 26-10-2018
            */

            //Route::get('/admin_modules/{id_seller}/{id_module}','AdminController@DeleteModule');
            Route::get('/delete_mod/{id_seller}/{id_module}','AdminController@DeleteModule');

            Route::post('admin_add_module/{id}','AdminController@AddModule');

            Route::post('SellerAddPromoter/{id}','AdminController@AddPromoterToSeller');

            Route::get('RemovePromoterFromSeller/{id_seller}/{id_promoter}','AdminController@RemovePromoterFromSeller');

            Route::post('AproveOrDenialSeller/{id_seller}','AdminController@AproveOrDenialSeller');

            Route::get('FindSalesman/{id}','AdminController@FindSalesman');
            Route::post('UpadateSalesman/{id}','AdminController@UpadateSalesman');
            Route::post('AddSalesman','AdminController@RegisterSalesman');
            Route::get('salesman_delete/{id}','AdminController@DeleteSalesman');

            Route::post('/promoter_c','AdminController@CreatePromoter');
            Route::get('/promoter_delete/{id}','AdminController@DeletePromoter');
            Route::get('/promoterUpdate/{id}','AdminController@promoterUpdate');
            Route::post('/UpdatePromoter/{id}','AdminController@UpdatePromoter');


            Route::post('Save_Package', 'AdminController@SavePackage');
            Route::post('UpdatePackage/{id}','AdminController@UpdatePackage');

            Route::get('GetPackage/{id}','AdminController@GetPackage');

            Route::get('DeletePackage/{id}','AdminController@DeletePackage');

        //_________________FIN de RUtas de Proveedores____________________________

        //___________________RUTAS DE DE USUARIOS_______________________

            Route::get('BackendUsers','AdminController@ShowBackendUsers');
        //----------------------------------------------------------------
   });


    Route::group(['middleware' => ['Operator']], function (){

        //-----------------Rutas de Solicitudes-------------------------------------
            Route::get('/admin_applys','AdminController@ShowApplys');
            Route::get('SellerApplyDataTable/{status}','AdminController@SellerApplyDataTable');

            Route::post('/add_salesman_to/{id}','AdminController@AddSalesmanToApllys');
            Route::get('/AddSalesMan/{idApplySeller}/{idSalesman}','AdminController@AddSalesMan');

            Route::get('/delete_promoter_from/{id_apply}/{id_promoter}','AdminController@DeleteSalesmanFromApllys');

            Route::post('AdminAproveOrDenialApplys/{id}','AdminController@StatusApllys');

            Route::get('/delete_applys_from/{promoter}/{applys}','AdminController@DeleteApplysFromPromoter');


        //__________________FIN DE RUTAS DE SOLICITUDES_____________________________

        //___________________RUTAS DE CONTENIDO_____________________________________



          //___________________Graficas y datos del Home de Contenido-______________

                Route::get('AdminContent','AdminContentController@Home');

                Route::get('AdminReport','AdminContentController@Reporte');

                Route::get('ContentAdminGraph','AdminContentController@ContentAdminGraph');

                Route::get('ContentStatusAdminGraph','AdminContentController@DonutGraph');

                Route::get('TagsGraphData','AdminContentController@TagsBarGraph');

                Route::get('TagsStatusGraphData','AdminContentController@TagsDountsGraph');

                Route::get('MusicianStatusGraphData','AdminContentController@MusicianPieGraphData');

                Route::get('MusicianGraphData','AdminContentController@MusicianBarrGraphData');

                /*Agregada 30-10-2018*/
                Route::get('/contenidoPendiente','AdminContentController@pendientes');
          //________________________________________________________________________


           //_______________________ALBUMES Y SINGLES________________________________

                Route::get('/admin_albums','AdminController@ShowAlbums');
                Route::get('/AllAdminAlbum','AdminController@ShowAllAlbums');
                Route::get('AlbumDataTable/{status}','AdminController@AlbumsDataTable');
                Route::get('/admin_songs/{id}','AdminController@AlbumSongs');
                Route::post('/admin_album/{id}','AdminController@AlbumStatus');

                Route::get('/admin_single','AdminController@ShowSingles');
                Route::get('SingleData/{status}','AdminController@SinglesDataTable');
                Route::post('/admin_singles/{id}','AdminController@SingleStatus');

           //---------------------------------------------------------------------

           //---------------------------ETIQUETAS-----------------------------------
                Route::get('TagsReview','TagController@ShowPendingTags');
                Route::get('TagsData/{status}','TagController@DataTableRender');
                Route::post('AprobalDenialTag/{id}','TagController@AprovalDenial');
                Route::post('newTag','TagController@store');
                Route::get('editTag/{id}','TagController@edit');
                Route::post('updateTag','TagController@update');
                Route::get('deleteTags/{id}','TagController@delete');
           //-----------------------------------------------------------------------

           //------------------------MUSICOS Y ARTISTAS----------------------------
                Route::get('/admin_musician','AdminController@ShowMusicianView');
                Route::get('MusicianData/{status}','AdminController@MusicianDataTable');
                Route::post('/admin_musician/{id}','AdminController@MusicianStatus');
           //----------------------------------------------------------------------

           //-----------------REVISTAS Y CADENAS DE PUBLICAION-----------------------

                Route::get('/admin_megazine','AdminController@ShowMegazine');

                Route::get('MegazineDataTable/{status}','AdminController@MegazineDataTable');

                Route::get('PubChainDataTable/{status}','AdminController@ShowPublicationChain');

                Route::post('/admin_chain/{id}','AdminController@PublicationChainStatus');

                Route::post('/admin_megazine/{id}','AdminController@MegazineStatus');

                Route::get('/AllAdminMegazinesChain','AdminController@ShowAllPublicationChain');

                Route::get('/AllAdminMegazines','AdminController@ShowAllMegazine');
           //------------------------------------------------------------------------
           //---------------LIBROS,SAGAS,TRILOGIAS, ETC------------------------------
                Route::get('admin_books','AdminController@ShowBooks');
                Route::get('BooksData/{status}','AdminController@BooksDataTable');
                Route::post('books_status/{id}','AdminController@EstatusBooks');
                Route::get('BSagasDataTable/{status}','AdminController@BooksSagasDataTable');
                Route::post('books_saga/{id}','AdminController@BooksSagasStatus');
                Route::post('/statusSaga/{id}','AdminController@statusSaga');
           //------------------------------------------------------------------------
           //--------------------AUTORES LITERARIOS----------------------------------
                // hay que hacer estos metodos
                Route::get('admin_authors_b','AdminController@ShowBooksAuthor');
                Route::get('BooksAuthorsData','AdminController@BooksAuthorData');
                Route::post('authors_books/{id}','AdminController@BooksAuthorStatus');
            //------------------------------------------------------------------------
            //-----------------------RADIOS-------------------------------------------
                Route::get('/admin_radio','AdminController@ShowRadios');
                Route::get('RadioData/{status}','AdminController@RadioDataTable');
                Route::get('BackendRadios','AdminController@BackendRadioData');
                Route::post('statusRadio/{id}','AdminController@RadioStatus');
                Route::post('NewBackendRadios','AdminController@NewBackendRadios');
                Route::get('BackendRadio/{id}','AdminController@GetBackendRadio');
                Route::get('DeleteBackendRadio/{id}','AdminController@DeleteBackendRadio');
                Route::post('UpdateBackendRadio','AdminController@UpdateBackendRadio');
            //-----------------------------------------------------------------------
            //---------------------------TV------------------------------------------
                Route::get('/admin_tv','AdminController@ShowTV');
                Route::get('DataTableTv/{status}','AdminController@DataTableTv');
                Route::get('BackendTV/{status}','AdminController@BackendTvData');
                Route::post('TvStatus/{id}','AdminController@TvStatus');
                Route::post('NewBackendTv','AdminController@NewBackendTv');
                Route::get('BackendTv/{id}','AdminController@GetBackendTv');
                Route::post('UpdateBackendTv','AdminController@UpdateBackendTv');
                Route::get('DeleteBackendTv/{id}','AdminController@DeleteBackendTv');
            //-----------------------------------------------------------------------
            //----------------------------PELICULAS----------------------------------
                Route::get('/admin_movies','AdminController@ShowMovies');
                Route::get('MoviesDataTable/{status}','AdminController@MoviesDataTable');
                Route::post('/admin_movie/{id}','AdminController@MovieStatus');
                Route::get('viewMovie/{id}','AdminController@viewMovie');
            //-----------------------------------------------------------------------
            //------------------------------SERIES-----------------------------------
                Route::get('/admin_series','AdminController@ShowSeries');
                Route::get('SeriesDataTable/{status}','AdminController@SeriesDataTable');
                Route::get('/sagaSerie/{id}','AdminController@sagaSerie');
                Route::post('/admin_serie/{id}','AdminController@SerieStatus');
                

            //-----------------------------------------------------------------------
                Route::get('/viewRejection/{idModulo}/{modulo}','AdminController@viewRejection');

        //________________Fin de las rutas de contenido_____________________________

        //______________________Rutas de Clientes___________________________________

                Route::get('/admin_clients','AdminController@ShowPendingClients');
                Route::get('ClientsDataTable','AdminController@ClientsData');
                Route::get('AllClientsDataTable','AdminController@AllClientsData');
                Route::get('RejectedClientsDataTable','AdminController@RejectedClientsData');
                Route::get('ReferalsDataTable/{id}','AdminController@WebsDataTable');
                Route::post('ValidateUser/{id}','AdminController@ValidateUser');
                Route::get('infoUser/{id}','AdminController@infoUsuario');

           //-----------------Pagos-----------------------------------------

                Route::get('DepsitDataTable','AdminController@DepsitDataTable');

                Route::post('DepositStatus/{id}','AdminController@DepositStatus');
                // agregadas el 19-09-2018
                Route::get('facturaDeposito/{idTicketSales}/{medio}/{idUser}','AdminController@facturaDeposito');
                Route::get('setFactura/{idTicketSales}/{idFactura}','AdminController@setFactura');
          //-------------------------
        //______________________Fin de las rutas de Clientes________________________

        //------------------------Rutas de autores literarios--------------------
        Route::get('/admin_autors','AdminController@ShowAuthorBooks');
        Route::get('/autoresLiterariosData/{status}','AdminController@AuthorBooks');
        Route::post('statusBookAuthor/{id}','AdminController@statusBookAuthor');
        //------------------------Rutas de autores literarios--------------------

    });

    Route::group(['middleware' => ['SuperAdmin']], function (){

         Route::get('Business','SuperAdminController@ShowBusiness');

         Route::get('PointsDetails','SuperAdminController@ShowPointsDetails');
         Route::get('PointsSalesDataTable/{status}','SuperAdminController@PointsSalesDataTable');
         Route::get('PointsRollBack/{id}','SuperAdminController@PointsRollBack');


         Route::get('TicketsDetail','SuperAdminController@ShowTicketsDetail');
         Route::get('TicketsSalesDataTable','SuperAdminController@TicketsSalesDataTable');
         Route::post('TicketsRollBack/{id}','SuperAdminController@TicketsRollBack');

         Route::get('UserDetails','SuperAdminController@ShowUserDetails');

         Route::get('UnReferedUserDataTable','SuperAdminController@UnReferedUserDataTable');

         Route::get('ExternalClients','ExternalClientsController@ViewExternalClients');
         
         Route::get('ExternalClientsDataTable','ExternalClientsController@ExternalClientsDataTable');

         Route::get('GetExternalClient/{id}','ExternalClientsController@GetExternalClient');

         Route::post('SaveExternalClients','ExternalClientsController@SaveExternalClients');

         Route::post('UpdateExternalClient/{id}','ExternalClientsController@UpdateExternalClient');

         Route::post('DeleteExternalClient/{id}','ExternalClientsController@DeleteExternalClient');

         Route::get('PendingPointsRoutine','SuperAdminController@PendingPointsToLeipel');
        
        //------------------------------- Rutas para los productos-------------------------------
            Route::get('Products','SuperAdminController@Products');
            Route::post('storeProducts','SuperAdminController@storeProducts');
            Route::get('dataProducts/{status}','SuperAdminController@dataProducts');
            Route::get('infoProduct/{id}','SuperAdminController@infoProduct');
            Route::post('updateProduct','SuperAdminController@updateProduct');
            Route::get('deleteProduct/{id}','SuperAdminController@deleteProduct');
            Route::post('statusProduct/{id}','SuperAdminController@statusProduct');
            
        //------------------------------- Rutas para los productos-------------------------------

        //------------------------------- Rutas para los ofertantes en backend -------------------------------
            Route::get('Bidder','BidderController@Bidder');
            Route::get('bidderByStatus/{status}','BidderController@bidderByStatus');
            Route::post('statusBidder/{id}','BidderController@statusBidder');
            Route::post('addModuleBidder','BidderController@addModuleBidder');
            Route::get('deleteModuleBidder/{idBidder}/{idModule}','BidderController@deleteModuleBidder');
        //------------------------------- Rutas para los ofertantes en backend -------------------------------

        //------------------------------- Rutas para los pagos del ofertantes --------------------------------
            Route::get('admin_bidder_payments','BidderController@paymentsBidder');
            Route::get('infoPaymentsBidder/{status}','BidderController@infoPaymentsBidder');
            Route::get('infoBidder/{idBidder}','BidderController@infoBidder');
            Route::post('bidderPayments/{idPago}','BidderController@bidderPayments');
        //------------------------------- Rutas para los pagos del ofertantes --------------------------------

        //------------------------------- Rutas para las conversiones --------------------------------
            Route::get('conversiones','ConversionesController@conversiones');
            Route::post('conversion','ConversionesController@conversion');
            Route::get('historialCosto/{tipo}','ConversionesController@historialCosto');
        //------------------------------- Rutas para las conversiones --------------------------------

        //------------------------------- Rutas para las categorias --------------------------------
            Route::get('ModulesBidder','ModuleBidderController@ModulesBidder');
            Route::post('addModule','ModuleBidderController@addModule');
            Route::get('infoModule/{idModule}','ModuleBidderController@infoModule');
            Route::post('updateModule','ModuleBidderController@updateModule');
            Route::get('deleteModule/{idModule}','ModuleBidderController@deleteModule');
        //------------------------------- Rutas para las categorias --------------------------------
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
    //agregada 10-10-2018
    Route::get('getDataSeller/{id}/{token}', 'SellerController@getDataSeller');

     //Agregada 24/01/2019
    



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
    
    Route::get('seller_edit', 'SellerController@edit');

    Route::post('seller_logout', 'SellerAuth\LoginController@logout');

    Route::get('messages','SellerController@ShowMessages');

    Route::post('/seller_complete', 'SellerController@CompleteRegistration');

    Route::resource('sellers', 'SellerController');
    
    Route::get('SellerBalance','SellerController@balance');

    //agregada 26-11-2018
    Route::get('BalanceSellerGraph','SellerController@DonutGraph');

    Route::get('SellerRequest','SellerController@Fondos');
    
    Route::post('SellerFunds','SellerController@applicationFunds');

    //Agregada 11/12/2018
    Route::get('ApplicationValidate','SellerController@validateAplication');

    //Agregada 25/01/2019
    Route::get('DeleteAccountSeller/{id}','SellerController@closed');

    //Agregada 28/01/2019
    Route::post('ChangePasswordSeller/{id}','SellerController@changepassword');



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

    /*---------- Registrar Artistas o Grupos Musicales ------------*/
    Route::get('/modify_artist', 'ArtistController@modify_artist');
    Route::post('/save_modify_artist', 'ArtistController@save_modify_artist');
    /*------------------------------------------------------------*/
    // Ruta nueva 16-08-2018
    /*---------- Listar artistas o grupos musicales ------------*/
    Route::get('/showArtist', 'ArtistController@showArtist');
    /*------------------------------------------------------------*/
    /*---------- Editar un artista o grupo musical -------------*/
    Route::get('/editArtist/{id}', 'ArtistController@editArtist');
    /*------------------------------------------------------------*/
    /*---------- Eliminar un artista o grupo musical ------------*/
    Route::get('/deleteArtist/{id}', 'ArtistController@deleteArtist');
    /*------------------------------------------------------------*/
    // Ruta nueva 16-08-2018

    /*---------- Registrar Albums -------------------------------*/
    Route::post('/albums', 'AlbumsController@CreateAlbum');
    Route::get('/albums', 'AlbumsController@ShowAlbumstForms');
    /*------------------------------------------------------------*/

    /*------------------Modificar Albums -------------------------- */
    Route::get('/modify_album/{id}', 'AlbumsController@ModifyAlbum');
    Route::post('/modify_album', 'AlbumsController@UpdateAlbum');
    Route::get('/musicFromAlbum/{id}', 'AlbumsController@musicFromAlbum');
    /*--------------------------------------------------------------*/

    /*------------------Borrar Albums-------------------------------*/
    Route::get('/delete_album/{id}', 'AlbumsController@DeleteAlbum');
    /*--------------------------------------------------------------*/

    /*------------------Mostrar Albums- ----------------------------*/
    Route::get('/show_album/{id}', 'AlbumsController@ShowAlbum');
    /*--------------------------------------------------------------*/

    /*-------------Listar Canciones de los Albums-------------------*/
    Route::get('/SongsAlbums/{id}','AlbumsController@SongAlbum');
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
    Route::post('/modify_single', 'AlbumsController@UpdateSong');
    /*--------------------------------------------------------------*/

    /*------------------------Detalle de single---------------------*/

    Route::get('/show_song/{id}', 'AlbumsController@ShowSong');

    /*--------------Panel de "Mi Contenido Musical"---------------- */
    Route::get('/my_music_panel/{id}', 'MusicController@ShowMusicPanel');
    /*--------------------------------------------------------------*/

    /*----------------------Agregar Tags--------------------------- */
    //Route::resource('tags','TagController');

    Route::post('AddTags','TagController@store');
    /*--------------------------------------------------------------*/

    /*--------------Panel de "Mi Contenido Musical"---------------- */
    Route::get('/my_music_panel/{id}', 'MusicController@ShowMusicPanel');
    /*--------------------------------------------------------------*/

    /*---------Canciones del Panel "Mi Contenido Musical"------------*/
    Route::get('/music_of_my_music_panel/{id}', 'MusicController@ShowMusicOfMyPanel');
    /*--------------------------------------------------------------*/

    /*--------------AJAX de Guardar Etiquetas---------------------- */
    Route::post('/tagMusic', 'AlbumsController@SaveTag');
    /*--------------------------------------------------------------*/

    /*----------------------Agregar Tags--------------------------- */
    Route::resource('tags','TagController');

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

    Route::get('showEpisode/{idE}/{idS}',[
        'uses'  => 'SeriesController@showEpisode',
        'as'    => 'series.showEpisode'
    ]);

    Route::get('seriesDestroy/{id}', [
        'uses' => 'SeriesController@destroy',
        'as'   => 'seriesDestroy'
    ]);

    /*
    modificada de manera generica
    //para q guarde el modal
    Route::post('sagas/registerS', [
        'uses' => 'SagaController@registerSeries',
        'as' => 'sagas.registerS'
    ]);
    */

    Route::get('destroyEpisode/{idE}/{idS}', [
        'uses' => 'SeriesController@destroyEpisode',
        'as' => 'destroyEpisode'
    ]);

    /*

    PROBAR ESTA RUTA AL ELIMINAR

    Route::get('series/{id}/destroy', [
        'uses' => 'SeriesController@destroy',
        'as' => 'series.destroy'
    ]);
    */

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
    Route::post('/type_megazine', 'MegazineController@AddPType');
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
    Route::post('/megazine_inde_update/{id}', 'MegazineController@UpdateIdMegazine');
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
    //ruta modificada (colocar el id como parametro)
    Route::get('show_books/{id}', [
        'uses' => 'BooksAuthorsController@showBooks',
        'as' => 'authors_books.showBooks'
    ]);
    //ruta modificada (colocar el id como parametro)

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

//----------------------- Rutas para el usuario OFERTANTE -----------------------
Route::post('BidderSubmit','BidderController@store');
Route::post('bidder_login','BidderAuth\LoginController@login');

Route::group(['middleware' => 'bidder_guest'], function(){
    Route::get('RegisterEmailBidder/{email}','BidderController@valEmailBidder');
    Route::get('bidderComplete/{id}/{token}','BidderController@bidderComplete');
    Route::post('BidderCompleteRegister','BidderController@BidderCompleteRegister');

});

Route::group(['middleware' => 'bidder_auth'], function(){
    Route::get('/bidder_home','BidderController@home');
    Route::get('bidderLogout','BidderAuth\LoginController@logout');
    Route::get('allProducts','ProductController@products');
    Route::post('productStore','ProductController@productStore');
    Route::get('productDelete/{idProduct}','ProductController@productDelete');
    Route::get('productInfo/{idProduct}','ProductController@productInfo');
    Route::post('productUpdate','ProductController@productUpdate');
    Route::get('retiro/{status?}','BidderController@retiro');
    Route::post('retirar','BidderController@retirar');
    Route::get('viewPayments/{status}','BidderController@viewPayments');
    Route::get('bidderPerfil','BidderController@bidderPerfil');
    Route::post('perfilBidder','BidderController@perfilBidder');
    Route::post('imagenPerfilBidder','BidderController@imagenPerfilBidder');
    Route::post('cambiarClaveBidder','BidderController@cambiarClaveBidder');
    Route::get('DeleteAccountBidder','BidderController@DeleteAccountBidder');
});

//----------------------- Rutas para el usuario OFERTANTE -----------------------
