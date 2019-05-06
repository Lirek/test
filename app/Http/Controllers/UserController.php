<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Events\InviteEvent;
use App\Events\BuyContentEvent;
use App\Events\NewContentNotice;
use DB;
use Illuminate\Support\Facades\Crypt;
use Hash;

use File;
use QrCode;
use Carbon\Carbon;

use App\User;
use App\Megazines;
use App\Tags;
use App\Albums;
use App\Songs;
use App\Seller;
use App\Radio;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Transactions;
use App\Referals;
use App\Movie;
use App\AccountBalance;
use App\Payments;
use App\Serie;
use App\Episode;
use App\TicketsPackage;

use App\Events\BookTraceEvent; //Agrega el Evento 
use App\Events\MegazineTraceEvent; //Agrega el Evento 
use App\Events\MovieTraceEvent; //Agrega el Evento 
use App\Events\SongTraceEvent; //Agrega el Evento
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        
        if (User::where('email','=',$request->email)->count()==1) 
        {
          return view('errors.unauthorized')->with('error','Ya se Encuentra Registrado');
        }

        $user->email = $request->email;
        
        $user->name = $request->name;
        
        $user->password = bcrypt($request->password);
                 
                 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
        
                   for ($i = 0; $i < 6; $i++) 
                      {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                      }


            $code=$randomString;

        $user->codigo_ref = $code;
       
        $user->credito=0;

        $user->save();

        $referal_user = User::where('codigo_ref','=',$request->user_code)->first();
      
        $refered = new Referals;

        $refered->user_id = $referal_user->id;

        $refered->refered = $user->id;

        $refered->my_code = $request->user_code;

        $refered->save();

        Auth::login($user);


        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = Auth::user();

       if ($user == true) {
        return redirect()->action('WelcomeController@welcome');
        }
    
       else {
        { 
        try 
        {
          $user= User::where('codigo_ref','=',$id)->firstOrFail();  
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exeption) 
        {
           return view('errors.unauthorized')->with('error','El Codigo Coincide Con Nuestros Registros');
        }
        return view('users.register')->with('user_code',$id);
       }
       
       }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        $user = User::find(Auth::user()->id);
        $patro = Referals::where('refered',Auth::user()->id)->get();
        $mipatro = null;
        if (count($patro)<=0){
          $mipatro = 0;
        } else {
          $mipatro = User::find($patro[0]->user_id);
        }

        return view('users.edit')->with('user', $user)->with('mipatro', $mipatro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        //$user->password = $request->password;
        $user->num_doc = $request->ci;
        $user->direccion = $request->direccion;
        $user->phone = $request->phone;
        $user->account_status = $request->account_status;
        if ($user->verify==2) {
            $user->verify = 0;
        }
        
        if ($request->type != null){
            $user->type= $request->type;
        }

        $user->alias = $request->alias;
        
        if ($request->hasFile('img_perf'))
        {

         $nombre = $this->sinAcento($request->name);


         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'userpic'.$nombre.time().'.'.$request->file('img_perf')->getClientOriginalExtension();

         $request->file('img_perf')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_perf = $real_path='/user/'.$user->id.'/profile/'.$name;             
        }
        
        $user->fech_nac = date("Y-m-d", strtotime($request->fech_nac));

        if ($request->hasFile('img_doc'))
        {

         $nombre = $this->sinAcento($request->name);

         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'document'.$nombre.time().'.'.$request->file('img_doc')->getClientOriginalExtension();

         $request->file('img_doc')->move($store_path,$name);
         
         $user->img_doc = '/user/'.$user->id.'/profile/'.$name;             
        }
     
        //dd($request->all());
        $user->save();

        //return view('seller_edit');
        Flash('Se han modificado sus datos con exito!')->success();
        return redirect()->action('UserController@edit');
     
        
    }

   public function changepassword(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->password = $request->password;
        $oldpass = $request->oldpass;
        $newpass = $request->newpass;
        $confnewpass = $request->confnewpass;
        $pass_encrypt = ($request->password);

        if (password_verify($oldpass, $user->password))
          { 
        
        if ($newpass == $confnewpass) {

              $user->password = bcrypt($newpass);

              $user->save();

            Flash('Se ha modificado su contraseña con exito!')->success();
            return redirect()->action('UserController@edit'); 
                     
        } 
        
        else 
    
          Flash('Su nueva contraseña ingresada no coincide con la verificación, Por favor intentelo de nuevo.')->success();
            return redirect()->action('UserController@edit');

          }

        else 

          Flash('Ha ingresado su contraseña antigua incorrectamente, por favor intentelo de nuevo.')->success();
          return redirect()->action('UserController@edit');
    }

    public function closed(Request $request, $id)
    {
        $user = User::find($id);
        $user->account_status = "closed";
        $user->save();
          
        Auth::logout();

        $add = DB::select('INSERT INTO users_closed SELECT * FROM users WHERE account_status="closed"');
        
    
        Flash('Se ha cerrado su cuenta exitosamente, Esperamos volverlo a ver pronto!')->success();

        return redirect()->action('WelcomeController@welcome');

    }

    public function sinAcento($cadena) {
        $originales =  'ÀÁÂÃÄÅÆàáâãäåæÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöðøÙÚÛÜùúûÇçÐýýÝßÞþÿŔŕÑñ';
        $modificadas = 'AAAAAAAaaaaaaaEEEEeeeeIIIIiiiiOOOOOOoooooooUUUUuuuCcDyyYBbbyRrÑñ';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return $cadena;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CompleteProfile (Request $request){
        $user = User::find(Auth::user()->id);

        $user->last_name = $request->lastname;
        $user->num_doc = $request->nDocument;

        if ($request->hasFile('img_doc'))
        {


         $store_path = public_path().'/user/'.$user->id.'/profile/';

         $name = 'document'.$nombre.time().'.'.$request->file('img_doc')->getClientOriginalExtension();

         $request->file('img_doc')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_doc = $real_path='/user/'.$user->id.'/profile/'.$name; 

        }
        $user->fech_nac = $request->dateN;

        if ($request->hasFile('img_perf'))
        {


         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'userpic'.$request->name.time().'.'.$request->file('img_perf')->getClientOriginalExtension();

         $request->file('img_perf')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_perf = $real_path='/user/'.$user->id.'/profile/'.$name;             
        }

        $user->alias = $request->alias;
        $user->save();

        event( new NewContentNotice($user->name,'Usuario'));
        
        Flash('Completo Sus Datos Con Exito')->success();
       return redirect()->action('HomeController@index');
    }

    public function referals(Request $request){
        $user_id= User::where('codigo_ref','=',$request->codigo)->where('id','<>',Auth::user()->id)->first();

        if ($user_id) {
            $referals=new Referals;
            $referals->user_id=$user_id->id;
            $referals->refered=Auth::user()->id;
            $referals->my_code=$request->codigo;
            $referals->save();
            Flash('Referencia Completa')->success();
                return redirect()->action('HomeController@index');
        }else
        Flash('Codigo invalido')->error();
        return redirect()->action('HomeController@index');



    }

    public function qrDownload(){
        $qr= QrCode::size(300)->format('png')->generate( url('/').'/register/'.Auth::user()->codigo_ref);
        $png=base64_encode($qr);
        $headers = array(
              'Content-Type: application/png',
            );
        return response()::make($png,'qr.png',$headers);
    }

    public function balance(){
        $Transaction=Transactions::where('user_id','=',Auth::user()->id)->get();
        if ($Transaction->count()!= 0) {
            foreach ($Transaction as $key)  {
                if($key->books_id != 0){
                    $accionM=Book::find($key->books_id);
                    $accion=$accionM->title;
                    //$accion='Compra de libro';
                            
                }
                elseif($key->album_id != 0){
                    $accionM=Albums::find($key->album_id);
                    $accion=$accionM->name_alb;
                }
                elseif($key->song_id != 0){
                    $accionM=Songs::find($key->song_id);
                    $accion=$accionM->song_name;
                }
                elseif($key->series_id != 0){
                    $accionM=Serie::find($key->series_id);
                    $accion=$accionM->title;
                }
                elseif($key->episodes_id != 0){
                    $accionM=Episode::find($key->episodes_id);
                    $accion=$accionM->episode_name;
                }
                elseif($key->movies_id != 0){
                    $accionM=Movie::find($key->movies_id);
                    $accion=$accionM->title;
                }
                elseif($key->megazines_id != 0){
                    $accionM=Megazines::find($key->megazines_id);
                    $accion=$accionM->title;
                }
                $Balance[]=array(
                        'Id' => $key->user_id,
                        'Date'=>$key->created_at->format('d/m/Y'),
                        'Cant'=>$key->tickets,
                        'Transaction'=>$accion,
                        'Type' => 1,
                        //'Factura' => $key->factura_id
                    );
            }
        }else{

            $Balance[]=0;
        }
        $Payment=Payments::where('user_id','=',Auth::user()->id)->where('status','=','Aprobado')->get();
        if ($Payment->count() != 0) {
            foreach ($Payment as $key) {
                $Balance[]=array(
                    'id_payments' => $key->id,
                    'Id' => $key->user_id,
                    'Date' => $key->created_at->format('d/m/Y'),
                    'Cant' => $this->tickets($key->package_id)*$key->value,
                    'Transaction' => 'Compra de tickets: '.$this->packTicket($key->package_id),
                    'Type' => 2,
                    'Method'=>$key->method,
                    'Factura' => $key->factura_id
                );
            }
        }else{
            $Balance[]=0;
        }
        
        $ordenBalance=collect($Balance)->sortBy('Date')->reverse()->toArray();


        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($ordenBalance);
        $perPage = 5;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

               return view('users.MyBalance')->with('Balance',$entries);
    }


    //function para grafica balance user
    public function DonutGraph() {

       if(Auth::user()->points){
          $points=Auth::user()->points;
       }else{
           $points=0;
        }

       if(Auth::user()->pending_points){
           $pending_points=Auth::user()->pending_points;
       }  else{
           $pending_points=0;
       }

        $Content=array(
            $points,
            $pending_points
        );
        return Response()->json($Content);
    }

    public function tickets($id){
        $cantidad=TicketsPackage::find($id);
        return $cantidad->amount;
    }
    public function packTicket($id){
        $cantidad=TicketsPackage::find($id);
        return $cantidad->name;
    }


//---------------------Iniicio de Compra, Muestra de Musica------------------
    

    //Funcion que recive el single a comprar y lo registra en la tabla Transacciones
    public function BuySingle($id)
    {
        $Single= Songs::find($id);
        
        $user = User::find(Auth::user()->id);

        if ($Single->cost > $user->credito) 
        {
            return response()->json(0);    
        }
        
        $check = Transactions::where('song_id','=',$Single->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }

        
          $checkS = Transactions::where('album_id','=',$Single->album)->where('user_id','=',$user->id)->get();
          $checkS->isEmpty();

          if(count($checkS)>=1)
          {
              return response()->json(2);   
          }
      
        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$Single->seller_id; 
            $Transaction->song_id=$Single->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $Single->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$Single->cost;
            $user->save(); 

             $seller = Seller::find($Single->seller_id);
            $seller->credito=$seller->credito+$Single->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$Single->seller_id;
            $account->balance=$Single->cost;
            $account->save();

            // $this->SendMail($Single->song_name,$Single->cost);

            return response()->json($Transaction);
        }
    
    }

    //funcion que se encarga de buscar el contenido musical del usuario 
    public function MyMusic()
    {
        $TransactionSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->get();


        if($TransactionSingle->count() > 0)
            {
            
                foreach ($TransactionSingle as $key) 
                    {
                        $Single[] = $key->Songs;    
                    }
            }
            else
             {
                $Single = 0;
                
             }
        $TransactionAlbum= Transactions::where('user_id','=',Auth::user()->id)->where('album_id','<>',0)->get(); 

        if($TransactionAlbum->count() > 0)
            {
            
                foreach ($TransactionAlbum as $key) 
                    {
                        $Albums[] = $key->Albums; 
                        $id=$key->Albums->id;
                    }
            }
            else
             {
                $Albums = 0;
             }


        
        return view('users.MyMusic')->with('Singles',$Single)->with('Albums',$Albums);
        
    }

    public function BuyAlbum($id,Request $request)
    {
        $Albums= Albums::find($id);
        
        $user = User::find(Auth::user()->id);

        if ($Albums->cost > $user->credito) 
        {
            return response()->json(0);    
        }
        
        $check = Transactions::where('album_id','=',$Albums->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        else
        {
            $TransactionAlbum= new Transactions;
            $TransactionAlbum->seller_id=$Albums->seller_id; 
            $TransactionAlbum->Album_id=$Albums->id;
            $TransactionAlbum->user_id=$user->id;
            $TransactionAlbum->tickets= $Albums->cost*-1;
            $TransactionAlbum->save();

            $user->credito= $user->credito-$Albums->cost;
            $user->save();

            $seller = Seller::find($Albums->seller_id);
            $seller->credito=$seller->credito+$Albums->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$Albums->seller_id;
            $account->balance=$Albums->cost;
            $account->save();

            // $this->SendMail($Albums->name_alb,$Albums->cost);

            return response()->json($TransactionAlbum);
        }
    
    }

    public function MyAlbums($id)
    {
        
        
        $Albums= Albums::find($id);

        $user= User::find(Auth::user()->id);
        $AlbumAdd=user::contenidos_add($user, 'album_id');
        $adquirido=(in_array($id, $AlbumAdd)) ? true : false;

        return view('users.MyAlbums')->with('Albums',$Albums)->with('adquirido',$adquirido);
        
    }

    public function MySingles($id)
    {
        
        
        $Song= Songs::find($id);
        
        $user= User::find(Auth::user()->id);
        $SongAdd=user::contenidos_add($user, 'song_id');
        $adquirido=(in_array($id, $SongAdd)) ? true : false;
        
        return view('users.MySingle')->with('Songs',$Song)->with('adquirido',$adquirido);
        
    }


    public function SongAlbum($id)
    {

        $Song= Songs::where('album','=',$id)->get(); 
    
            
        return response()->json($Song);
        
    }

    public function SongSingles()
    {
        $TransactionSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->get();
        if($TransactionSingle->count()>0){
          foreach ($TransactionSingle as $key) {
             $song=Songs::where('id','=',$key->song_id)->first();
              $Song[] = array(
                'cover'=>$song->cover,
                'photo'=>$song->autors->photo,
                'song_file'=>$song->song_file,
                'song_name'=>$song->song_name
            );  
          }
            
        }
             
        return response()->json($Song);
        
    }


    public function AddElementPlaylist($song_id)
    {
        $Songs= Songs::find($song_id);
        
        $file= $Songs->song_file;
        
        if($Songs->album==0 or $Songs->album==NULL)
        {
            $img= $Songs->autors->photo;
        }
        else
        {
            $img=$Songs->album->cover;    
        }
        
        $title=$Songs->song_name;
        $artist=$Songs->autors->name;

        $insert='{"title":'.$title.',"artist:":'.$artist.',"img":'.$img.', "file":'.$file.'}';

        $Playlist= Storage::putFileAs('Playlist', new File('/user/'.Auth::id().'Playlist'), 'public');


        return response()->json($Playlist);

    }
//-------------------------------------------------------------------------
        public function BuyMagazines(Request $request,$id)
    {
        $megazine= Megazines::find($id);
        $user = User::find(Auth::user()->id);
      

        $check = Transactions::where('megazines_id','=',$megazine->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        
        if ($megazine->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$megazine->seller_id; 
            $Transaction->megazines_id=$megazine->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $megazine->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$megazine->cost;
            $user->save(); 

            $seller = Seller::find($megazine->seller_id);
            $seller->credito=$seller->credito+$megazine->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$megazine->seller_id;
            $account->balance=$megazine->cost;
            $account->save();

            //$this->SendMail($book->title,$book->cost);

            return response()->json($Transaction);
        }

    }

    public function BuyBook(Request $request,$id)
    {
        $book= Book::find($id);
        $user = User::find(Auth::user()->id);
      

        $check = Transactions::where('books_id','=',$book->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        
        if ($book->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$book->seller_id; 
            $Transaction->books_id=$book->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $book->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$book->cost;
            $user->save(); 

            $seller = Seller::find($book->seller_id);
            $seller->credito=$seller->credito+$book->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$book->seller_id;
            $account->balance=$book->cost;
            $account->save();

            //$this->SendMail($book->title,$book->cost);

            return response()->json($Transaction);
        }

    }

    public function ShowMyReadings()
    {

        $MyBooks= Transactions::where('user_id','=',Auth::user()->id)->where('books_id','<>',0)->get();


        if ($MyBooks->count() == 0) 
        {
            $Books=0;
        }
        else
        {
            foreach ($MyBooks as $key) 
            {
                $Books[]= Book::find($key->books_id);
            }
        }

        

        return view('users.MyReadings')->with('Books',$Books);
    }
    public function ShowMyReadingsMegazines()
    {

        $MyMegazines= Transactions::where('user_id','=',Auth::user()->id)->where('megazines_id','<>',0)->get();


        if ($MyMegazines->count() == 0) 
        {
            $Megazine= 0;
        }
        else
        {
            foreach ($MyMegazines as $key) 
            {
                $Megazine[]= Megazines::find($key->megazines_id);        
            }
        }

        

        return view('users.MyMagazine')->with('Megazines', $Megazine);
    }



    public function SendRead($id)
    {
        $Book=Book::find($id);
        $Megazine= Megazines::find($id);

        if ($Book->count() == 0) 
        {
            return view('users.MyLecture')->with('book',$Megazine);
        }
        else
        {
            return view('users.MyLecture')->with('book',$Book);
        }

    }

      public function ShowMyReadBook($id)
    {
        $Book=Book::find($id);

        $user= User::find(Auth::user()->id);
        $BookAdd=user::contenidos_add($user, 'books_id');
        $adquirido=(in_array($id, $BookAdd)) ? true : false;
        if($adquirido){
          event(new BookTraceEvent(Auth::user()->id,$id));
        }
            return view('users.show')->with('book',$Book)->with('adquirido',$adquirido);
    }

      public function ShowMyReadMegazine($id)
    {
        $Megazine= Megazines::find($id);
        $user= User::find(Auth::user()->id);
        $BookAdd=user::contenidos_add($user, 'megazines_id');
        $adquirido=(in_array($id, $BookAdd)) ? true : false;
        if($adquirido){
          event(new MegazineTraceEvent(Auth::user()->id,$id));
        }
        return view('users.showMegazine')->with('megazines',$Megazine)->with('adquirido',$adquirido);
    }
//----------------------------Peliculas-------------------------------------
    public function MyMovies()
    {
        $TransactionMovies= Transactions::where('user_id','=',Auth::user()->id)->where('movies_id','<>',0)->get();


        if($TransactionMovies->count() > 0)
            {
            
                foreach ($TransactionMovies as $key) 
                    {
                        $Movies[] = $key->Movies;    
                    }
            }
            else
             {
                $Movies = 0;
                
             }


        
       return view('users.MyMovies')->with('Movies',$Movies);
        
    }

   public function ShowMyMovie($id)
    {
        $Movies=Movie::find($id);
        event(new MovieTraceEvent(Auth::user()->id,$id));

            return view('users.showMovie')->with('Movies',$Movies);
    }
    
    public function BuyMovie(Request $request,$id)
    {
        $movie= Movie::findOrfail($id);
        $user = User::find(Auth::user()->id);

        if ($movie->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        $check = Transactions::where('movies_id','=',$movie->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$movie->seller_id; 
            $Transaction->movies_id=$movie->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $movie->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$movie->cost;
            $user->save(); 

            $seller = Seller::find($movie->seller_id);
            $seller->credito=$seller->credito+$movie->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$movie->seller_id;
            $account->balance=$movie->cost;
            $account->save();

            // $this->SendMail($movie->title,$movie->cost);

            return response()->json($Transaction);
        }

    }
//----------------------------Series----------------------------------------
    public function BuySerie(Request $request,$id)
    {
        $serie= Serie::find($id);
        $user = User::find(Auth::user()->id);

        if ($serie->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        $check = Transactions::where('series_id','=',$serie->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$serie->seller_id; 
            $Transaction->series_id=$serie->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $serie->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$serie->cost;
            $user->save(); 

            $seller = Seller::find($serie->seller_id);
            $seller->credito=$seller->credito+$serie->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$serie->seller_id;
            $account->balance=$serie->cost;
            $account->save();

            // $this->SendMail($movie->title,$movie->cost);

            return response()->json($Transaction);
        }

    }

    public function BuyEpisode(Request $request,$id)
    {
        $serie= Episode::find($id);
        $user = User::find(Auth::user()->id);

        if ($serie->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        $check = Transactions::where('episodes_id','=',$serie->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }

        $checkS = Transactions::where('series_id','=',$serie->Serie->id)->where('user_id','=',$user->id)->get();
        $checkS->isEmpty();

        if(count($checkS)>=1)
        {
            return response()->json(2);   
        }

        else
        {
            $Transaction= new Transactions;
            $Transaction->seller_id=$serie->seller_id; 
            $Transaction->episodes_id=$serie->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $serie->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$serie->cost;
            $user->save(); 

            $seller = Seller::find($serie->seller_id);
            $seller->credito=$seller->credito+$serie->cost;
            $seller->save();

            $account=new AccountBalance;
            $account->seller_id=$serie->seller_id;
            $account->balance=$serie->cost;
            $account->save();

            // $this->SendMail($movie->title,$movie->cost);

            return response()->json($Transaction);
        }

    }
    public function MySeries()
    {
        $TransactionSeries= Transactions::where('user_id','=',Auth::user()->id)
                            ->where('series_id','<>',0)->get();
        $TransactionEpisodes= Transactions::where('user_id','=',Auth::user()->id)
                            ->where('episodes_id','<>',0)->get();


        if($TransactionSeries->count() > 0)
            {
            
                foreach ($TransactionSeries as $key) 
                    {
                        $Series[] = $key->Series;    
                    }
            }
        if($TransactionEpisodes->count() > 0)
        {
           foreach ($TransactionEpisodes as $key) 
                    {
                        $Series[] = $key->Episodes;    
                    } 
        }   

        elseif ($TransactionSeries->count() == 0 && $TransactionEpisodes->count() == 0)
        {
            $Series = 0;
                
        }


        
       return view('users.MySeries')->with('Series',$Series);
        
    }

    public function ShowMySerie($id,$type)
    {
        if($type=='Serie'){
            $Series=Serie::find($id);
        }else
        {
            $Series=Episode::find($id);
        }
        // event(new MovieTraceEvent(Auth::user()->id,$id));

            return view('users.showSerie')->with('Series',$Series)->with('Type',$type);
    }

//----------------------------Invitar Personas------------------------------

    public function Invite(Request $request)
    {
        
        $url= url('/').'/register/'.Auth::user()->codigo_ref;
        event(new InviteEvent(Auth::user()->name,$request->email,$url));
        Flash('Se Ha Invitado con Exito')->success();
        return redirect()->action('HomeController@index');

    }


//--------------------------------------------------------------------------
//-----------------------------Mail-----------------------------------------
    public function SendMail($content,$cost)
    {
        
        //$url= url('/').'/register/'.Auth::user()->codigo_ref;
        event(new BuyContentEvent(Auth::user()->email,$content,$cost));
        //Flash('Se Ha Invitado con Exito')->success();
        return true;

    }

}
