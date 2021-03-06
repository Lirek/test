<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Auth;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Log;


//Seller Model
use App\Seller;
use App\User;
use App\SellersRoles;
use App\ApplysSellers;
use App\Transactions;
use App\SellersAcces;
use Laracasts\Flash\Flash;
//use App\music_authors;
use App\Albums;
use App\Songs;
use App\Megazines;
use App\Radio;
use App\Book;
use App\Tv;
use App\Movie;
use App\Serie;
use App\Episode;
use App\PaymentSeller;

class SellerController extends Controller
{

    public function homeSeller() {

        $id = Auth::guard('web_seller')->user()->id;
        $seller = Seller::find($id);
        
        $tv_content = 0;
        $radio_content = 0;
        $megazine_content = 0;
        $serie_content = 0;
        $book_content = 0;
        $movie_content = 0;
        $musical_content = 0;

        $tv_aproved = 0;
        $radio_aproved = 0;
        $megazine_aproved = 0;
        $serie_aproved = 0;
        $book_aproved = 0;
        $movie_aproved = 0;
        $musical_aproved = 0;

        $seller_modules = false;

        /*
        if($seller->roles())
        {
            $seller_modules;
        }
        */

        foreach ($seller->roles as $role) {
            $seller_modules[] = $role;
            switch ($role->name) {
                case 'Musica':
                    $content_album = count($seller->albums()->get());
                    $aproved_album = count($seller->albums()->where('status','Aprobado')->get());
                    $content_song = count($seller->songs()->where('album',0)->get());
                    $aproved_song = count($seller->songs()->where('album',0)->where('status','Aprobado')->get());
                    $musical_content = $content_album+$content_song;
                    $musical_aproved = $aproved_album+$aproved_song;
                break;
                case 'Peliculas':
                    $movie_content = count($seller->movies()->get());
                    $movie_aproved = count($seller->movies()->where('status','Aprobado')->get());
                break;
                case 'Libros':
                    $book_content = count($seller->Books()->get());
                    $book_aproved = count($seller->Books()->where('status','Aprobado')->get());
                break;
                case 'Series':
                    $serie_content = count($seller->series()->get());
                    $serie_aproved = count($seller->series()->where('status','Aprobado')->get());
                break;
                case 'Revistas':
                    $megazine_content = count($seller->Megazines()->get());
                    $megazine_aproved = count($seller->Megazines()->where('status','Aprobado')->get());
                break;
                case 'Radios':
                    $radio_content = count($seller->Radio()->get());
                    $radio_aproved = count($seller->Radio()->where('status','Aprobado')->get());
                break;
                case 'TV':
                    $tv_content = count($seller->Tv()->get());
                    $tv_aproved = count($seller->Tv()->where('status','Aprobado')->get());
                break;
            }
        }
        $tvs = [];
        $Tv = $seller->Tv()->orderBy('created_at','desc')->paginate(8);
        foreach ($Tv as $t) {
            $tvs[] = array(
                'id' => $t->id,
                'logo' => $t->logo,
                'type' => 'tv'
            );
        }
        $radios = [];
        $Radio = $seller->Radio()->orderBy('created_at','desc')->paginate(8);
        foreach ($Radio as $r) {
            $radios[] = array(
                'id' => $r->id,
                'logo' => $r->logo,
                'type' => 'radio'
            );
        }
        $lectura = [];
        $Megazines = $seller->Megazines()->orderBy('created_at','desc')->paginate(8);
        foreach ($Megazines as $m) {
            $lectura[] = array(
                'id' => $m->id,
                'cover' => $m->cover,
                'type' => 'revista'
            );
        }
        $Book = $seller->Books()->orderBy('created_at','desc')->paginate(8);
        foreach ($Book as $b) {
            $lectura[] = array(
                'id' => $b->id,
                'cover' => "/images/bookcover/".$b->cover,
                'type' => 'libro'
            );
        }
        $cine = [];
        $Series = $seller->series()->orderBy('created_at','desc')->paginate(8);
        foreach ($Series as $s) {
            $cine[] = array(
                'id' => $s->id,
                'img_poster' => $s->img_poster,
                'type' => 'serie'
            );
        }
        $Movies = $seller->movies()->orderBy('created_at','desc')->paginate(8);
        foreach ($Movies as $m) {
            $cine[] = array(
                'id' => $m->id,
                'img_poster' => 'movie/poster/'.$m->img_poster,
                'type' => 'pelicula'
            );
        }
        $musica = [];
        $Songs = $seller->songs()->where('album',null)->orderBy('created_at','desc')->paginate(8);
        foreach ($Songs as $s) {
            $musica[] = array(
                'id' => $id,
                'cover' => '/plugins/img/DefaultMusic.png',
                'type' => 'cancion'
            );
        }
        $Albums = $seller->albums()->orderBy('created_at','desc')->paginate(8);
        foreach ($Albums as $a) {
            $musica[] = array(
                'id' => $a->id,
                'cover' => $a->cover,
                'type' => 'album'
            );
        }
        //dd($Songs,$Albums,$musica);
        /*
        if ($Movies==NULL) { $Movies=False; }
        if ($Tv==NULL) { $Tv=False; }
        if ($Radio==NULL) { $Radio=False; }
        if ($Megazines==NULL) { $Megazines=False; }
        if ($Albums==NULL) { $Albums=False; }
        if ($Songs==NULL) { $Songs=False; }  
        if($Book==NULL){ $Book=False; } 
        if($Series==NULL){ $Series=False;}
        */

        $total_content = $tv_content+$radio_content+$megazine_content+$serie_content+$book_content+$movie_content+$musical_content;
        $total_aproved = $tv_aproved+$radio_aproved+$megazine_aproved+$serie_aproved+$book_aproved+$movie_aproved+$musical_aproved;
        $content_for_aprove = $total_content-$total_aproved;

        $followers=count($seller->followers()->get());
        
        
        return view('seller.home')
                ->with('total_content',$total_content)
                ->with('total_aproved',$total_aproved)
                ->with('content_for_approve', $content_for_aprove)
                ->with('followers', $followers)
                ->with('tv_content',$tv_content)
                ->with('radio_content',$radio_content)
                ->with('megazine_content',$megazine_content)
                ->with('serie_content',$serie_content) 
                ->with('book_content',$book_content) 
                ->with('movie_content',$movie_content)
                ->with('musical_content',$musical_content)
                ->with('musica',$musica)
                ->with('cine',$cine)
                ->with('lectura',$lectura)
                ->with('radios',$radios)
                ->with('tvs',$tvs)
                //->with('artist',$autor)
                ->with('modulos',$seller_modules);
    }

    //Funcion encargada de cargar los datos del formulario a la BD para el Registro completo
    public function CompleteRegistrationForm($id,$code) {
        $ApplysSellers = ApplysSellers::find($id);
        $seller = Seller::where('email',$ApplysSellers->email)->first();
        //dd(isset($seller[0]));
        if (isset($seller)) {
            $validacion = 1; // ya el usuario ya completó el registro
        } else {
            $validacion = 0; // el usuario aun no ha completado el registro
        }
        return view('seller.complete')->with('valSeller',$validacion);
        /*
        if ($ApplysSellers!=null) {
            if ($code == $ApplysSellers->token) {
                return view('seller.complete');
            } else {
                flash()->error('El enlace procesado no corresponde a nuestros registros');
                return view('seller.auth.login');
            }
        } else {
            return view('seller.complete');
        }
        */
    }
    //Funcion encargada de cargar los datos del formulario a la BD para el Registro completo

    // Funcion que busca la informacion del proveedor para colocarlar en el formulario de completado
    public function getDataSeller($id,$token) {
        $ApplysSellers = ApplysSellers::find($id);
        if ($ApplysSellers!=null) { // si existe ese registro con ese id
            if ($ApplysSellers->token === $token) { // si coincide el token que se envia con el del registro
                return response()->json($ApplysSellers); // retorna la informacion
            } else {
                return response()->json(1); // si no corresponde el token
            }
        } else {
            return response()->json(0); // si no existe el registro con ese id
        }
    }
    // Funcion que busca la informacion del proveedor para colocarlar en el formulario de completado

 public function CompleteRegistration(Request $request)
    {
        //dd($request->all());
        //$store_path='documents/sellers/';
        $nombre = $this->sinAcento($request->name);
        $store_path = public_path().'/sellers/'.$request->ruc.'/documents/';
        $name = $request->ruc.time().'.'.$request->file('adj_ruc')->getClientOriginalExtension();
        $request->file('adj_ruc')->move($store_path,$name);
        $real_path = '/sellers/'.$request->ruc.'/documents/'.$name;
        //$path = $request->file('adj_ruc')->storeAs($store_path,$nombre.'.'.$request->file('adj_ruc')->getClientOriginalExtension());
        $Seller = new Seller;
        $Seller->name = $request->name;
        $Seller->email = $request->email;
        $Seller->password = bcrypt($request->password);
        $Seller->estatus = 'Pre-Aprobado';
        $Seller->ruc_s = $request->ruc;
        $Seller->descs_s = $request->dsc;
        $Seller->adj_ruc = $real_path;
        $Seller->tlf = $request->tlf;
        $Seller->address = $request->address;
        $Seller->save();
        Auth::guard('web_seller')->login($Seller);
        $seller_roles = SellersRoles::where('name',$request->modulo)->first();
        $seller= Seller::find(Auth::guard('web_seller')->user()->id);
        $data = $seller->roles()->attach($seller_roles);
        if ($request->modulo=="Peliculas") {
            $seller_roles = SellersRoles::where('name','Series')->get();
            $seller= Seller::find(Auth::guard('web_seller')->user()->id);
            $data = $seller->roles()->attach($seller_roles);
        }
        if ($request->modulo=="Libros") {
            $seller_roles = SellersRoles::where('name','Revistas')->get();
            $seller= Seller::find(Auth::guard('web_seller')->user()->id);
            $data = $seller->roles()->attach($seller_roles);
        }
        if ($request->submodulo!=null) {
            $seller_sub_roles = SellersRoles::where('name',$request->submodulo)->get();
            $data = $seller->roles()->attach($seller_sub_roles);
        }

        //return view('seller.home')->with('total_content', 0)->with('aproved_content', 0)->with('followers', 0);
        return redirect()->action(
            'SellerController@homeSeller'
        );
    }

    public function sinAcento($cadena) {
        $originales =  'ÀÁÂÃÄÅÆàáâãäåæÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöðøÙÚÛÜùúûÇçÐýýÝßÞþÿŔŕÑñ';
        $modificadas = 'AAAAAAAaaaaaaaEEEEeeeeIIIIiiiiOOOOOOoooooooUUUUuuuCcDyyYBbbyRrÑñ';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return $cadena;
    }

    public function ShowMessages()
    {
        $user=Auth::guard('web_seller')->user()->id;
        
        return view('seller.messages');
    }

    public function edit()
    {
        $seller = Seller::find(Auth::guard('web_seller')->user()->id);

        $tv_content = 0;
        $radio_content = 0;
        $megazine_content = 0;
        $serie_content = 0;
        $book_content = 0;
        $movie_content = 0;
        $musical_content = 0;

        $tv_aproved = 0;
        $radio_aproved = 0;
        $megazine_aproved = 0;
        $serie_aproved = 0;
        $book_aproved = 0;
        $movie_aproved = 0;
        $musical_aproved = 0;


        foreach ($seller->roles as $role) 
        {
            $seller_modules[] = $role;

            switch ($role->name) 
            {
                
                case 'Musica':
                    $content_album = count($seller->albums()->get());
                    $aproved_album = count($seller->albums()->where('status','Aprobado')->get());
                    $content_song = count($seller->songs()->where('album',0)->get());
                    $aproved_song = count($seller->songs()->where('album',0)->where('status','Aprobado')->get());
                    $musical_content = $content_album+$content_song;
                    $musical_aproved = $aproved_album+$aproved_song;
                    
                    break;

                case 'Peliculas':
                    $movie_content = count($seller->movies()->get());
                    $movie_aproved = count($seller->movies()->where('status','Aprobado')->get());
                   
                    break;
                
                case 'Libros':
                    $book_content = count($seller->Books()->get());
                    $book_aproved = count($seller->Books()->where('status','Aprobado')->get());
                    
                    break;
                
                case 'Series':
                    $serie_content = count($seller->series()->get());
                    $serie_aproved = count($seller->series()->where('status','Aprobado')->get());
                    
                    break;

                case 'Revistas':
                    $megazine_content = count($seller->Megazines()->get());
                    $megazine_aproved = count($seller->Megazines()->where('status','Aprobado')->get());
                     
                    break;

                case 'Radios':
                    $radio_content = count($seller->Radio()->get());
                    $radio_aproved = count($seller->Radio()->where('status','Aprobado')->get());
                    
                    break;

                case 'TV':
                    $tv_content = count($seller->Tv()->get());
                    $tv_aproved = count($seller->Tv()->where('status','Aprobado')->get());
                    break;
                
                default:
                    # code...
                    break;
            };

        };
    
        $total_content = $tv_content+$radio_content+$megazine_content+$serie_content+$book_content+$movie_content+$musical_content;
        $total_aproved = $tv_aproved+$radio_aproved+$megazine_aproved+$serie_aproved+$book_aproved+$movie_aproved+$musical_aproved;
        $content_for_aprove = $total_content-$total_aproved;

        return view('seller.edit')  ->with('seller',$seller)
                                    ->with('total_content',$total_content)
                                    ->with('total_aproved',$total_aproved)
                                    ->with('content_for_aprove',$content_for_aprove);
    }

    public function update(Request $request)
    {
        $seller = Seller::find(Auth::guard('web_seller')->user()->id);

        if ($request->logo <> null) {
            $file = $request->file('logo');
            $name = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/producer/logo';
            $file->move($path, $name);
            $seller->logo ='/images/producer/logo/'.$name;
        }

       if ($request->adj_ruc <> null) {
            // $file1 = $request->file('adj_ruc');
            // $name1 = 'ruc_' . time() . '.' . $file1->getClientOriginalExtension();
            // $path1 = public_path() . '/images/producer/ruc/';
            // $file1->move($path1, $name1);
            // $seller->adj_ruc = '/images/producer/ruc/'.$name1;

            $nombre = $this->sinAcento($request->name);
            $store_path = public_path().'/sellers/'.$nombre.$request->ruc.'/documents/';
            $name = $nombre.time().'.'.$request->file('adj_ruc')->getClientOriginalExtension();
            $request->file('adj_ruc')->move($store_path,$name);
            $real_path = '/sellers/'.$nombre.$request->ruc.'/documents/'.$name;
            $seller->adj_ruc = $real_path;
        }

        // if ($request->adj_ci <> null) {
        //     $file2 = $request->file('adj_ci');
        //     $name2 = 'ci_' . time() . '.' . $file2->getClientOriginalExtension();
        //     $path2 = public_path() . '/images/producer/ci';
        //     $file2->move($path2, $name2);
        //     $seller->adj_ci = $name2;
        // }

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->tlf = $request->phone;
        $seller->ruc_s = $request->ruc_s;
        $seller->address = $request->direccion;
        $seller->save();

        header("Refresh:0; url=".asset('/seller_edit'));
        //return view('seller.edit')->with('seller',$seller);

        Flash::warning('Se ha modificado ' . $seller->name . ' de forma exitosa!')->important();


        //return redirect()->action('SellerController');

    }

     public function changepassword(Request $request, $id)
    {
        $seller = Seller::find($id);

        $seller->password = $request->password;
        $oldpass = $request->oldpass;
        $newpass = $request->newpass;
        $confnewpass = $request->confnewpass;
        $pass_encrypt = ($request->password);

        if (password_verify($oldpass, $seller->password))
          {

        if ($newpass == $confnewpass) {

              $seller->password = bcrypt($newpass);

              $seller->save();

            Flash('Se ha modificado su contraseña con exito!')->success();
            //header("Refresh:0; url=/seller_edit");
            return redirect()->action('SellerController@homeSeller');

        }
        else
            Flash::warning('Su nueva contraseña ingresada no coincide con la verificación, Por favor intentelo de nuevo.')->important();
            return redirect()->action('SellerController@homeSeller');;

          }

        else
            Flash::warning('Ha ingresado incorrectamente su contraseña antigua, por favor intentelo de nuevo.')->important();
            return redirect()->action('SellerController@homeSeller');;

    }

    public function closed(Request $request, $id)
    {
        $seller = Seller::find($id);
        $seller->account_status = "closed";
        $seller->save();

        Auth::logout();

        $add = DB::select('INSERT INTO sellers_closed SELECT * FROM sellers WHERE account_status="closed"');
        $del = DB::delete('DELETE FROM sellers WHERE account_status="closed"');

        Flash('Se ha cerrado su cuenta exitosamente, Esperamos volverlo a ver pronto!')->success();

        return redirect()->action('WelcomeController@welcome');

    }

    public function balance(){
        $Transaction=Transactions::where('seller_id','=',Auth::guard('web_seller')->user()->id)->get();
        if ($Transaction->count()!= 0) {
            foreach ($Transaction as $key)  {
                if($key->books_id != 0){
                    $accionM=Book::find($key->books_id);
                    $accion=$accionM->title;
                    $Contenido='Libro';
                }
                elseif($key->album_id != 0){
                    $accionM=Albums::find($key->album_id);
                    $accion=$accionM->name_alb;
                    $Contenido='Album';
                }
                elseif($key->song_id != 0){
                    $accionM=Songs::find($key->song_id);
                    $accion=$accionM->song_name;
                    $Contenido='Sencillo';
                }
                elseif($key->series_id != 0){
                    $accionM=Serie::find($key->series_id);
                    $accion=$accionM->title;
                    $Contenido='Serie';
                }
                elseif($key->episodes_id != 0){
                    $accionM=Episode::find($key->episodes_id);
                    $accion=$accionM->episode_name;
                    $Contenido='Episodio';
                }
                elseif($key->movies_id != 0){
                    $accionM=Movie::find($key->movies_id);
                    $accion=$accionM->title;
                    $Contenido='Pelicula';
                }
                elseif($key->megazines_id != 0){
                    $accionM=Megazines::find($key->megazines_id);
                    $accion=$accionM->title;
                    $Contenido='Revista';
                }
                $user= User::find($key->user_id);

                $Balance[]=array(
                        'User' => $user->alias,
                        'Date'=>$key->created_at->format('d/m/Y'),
                        'Cant'=>$key->tickets,
                        'Content'=>$Contenido,
                        'Transaction'=>$accion,
                        'Type' => 1,
                        //'Factura' => $key->factura_id
                    );
            }
        }else{

            $Balance[]=0;
        }
        $Payment=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->get();
        if ($Payment->count() != 0) {
            foreach ($Payment as $key) {
                $Balance[]=array(
                    'User' => 'No aplica',
                    'Date' => $key->created_at->format('d/m/Y'),
                    'Cant' => $key->tickets,
                    'Content'=>$key->status,
                    'Transaction' => 'Retiro de fondos',
                    'Type' => 2,
                );
            }
        }else{
            $Balance[]=0;
        }
        $diferido=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Diferido')->sum('tickets');
        $pagado=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Pagado')->sum('tickets');
        $rechazado=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Rechazado')->sum('tickets');


        $ordenBalance=collect($Balance)->sortBy('Date')->reverse()->toArray(); //se retorna para la tabla

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($ordenBalance);
        $perPage = 5;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

        return view('seller.MyBalance')->with('Balance',$entries)->with('diferido',$diferido)->with('pagado',$pagado)->with('rechazado',$rechazado)->with('entries',$entries);
    }

    //function para grafica balance seller
    public function DonutGraph() {
        $pendientes=Auth::guard('web_seller')->user()->credito_pendiente;
        $credito=Auth::guard('web_seller')->user()->credito;
        $diferido=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Diferido')->sum('tickets');

        $Content=array(
            $credito,
            $pendientes,
            $diferido
        );
        return Response()->json($Content);
    }

     public function Fondos(){
        $payment = PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->get();
        $diferido=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Diferido')->sum('tickets');
        $pagado=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Pagado')->sum('tickets');
        return view('seller.Fondos')->with('payment',$payment)->with('diferido',$diferido)->with('pagado',$pagado);
     }

     public function applicationFunds(Request $request)
    {
        $seller = Seller::find(Auth::guard('web_seller')->user()->id);

        $seller->credito_pendiente=$seller->credito_pendiente+$request->cant;
        $seller->credito= $seller->credito-$request->cant;
        $seller->save();

        $payment= new PaymentSeller;
        $payment->seller_id= Auth::guard('web_seller')->user()->id;

        if ($request->factura <> null) {
            $file = $request->file('factura');
            $name = 'factura_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/producer/factura';
            $file->move($path, $name);
            $payment->factura ='/images/producer/factura/'.$name;
        }

        $payment->tickets= $request->cant;
        $payment->status=2;

        $payment->save();

        Flash::warning('Su solicitud de retiro se envio de forma exitosa')->important();

        //return view('seller.edit')->with('seller',$seller);
        return redirect()->action('SellerController@Fondos');

    }

    public function validateAplication()
    {
        $payment=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','<>','Pagado')->where('status','<>','Rechazado')->get();
        if (count($payment)>=1) {
            foreach ($payment as $key ) {
                return response()->json($key->status);
            }
        }
        else{
            return response()->json(1);
            
        }

    }

}
