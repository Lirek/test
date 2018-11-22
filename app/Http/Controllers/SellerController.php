<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

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
        $Tv=$seller->Tv()->orderBy('created_at','desc')->get();
        $Radio=$seller->Radio()->orderBy('created_at','desc')->get();
        $Megazines=$seller->Megazines()->orderBy('created_at','desc')->get();
        $Series=$seller->series()->orderBy('created_at','desc')->get();
        $Book=$seller->Books()->orderBy('created_at','desc')->get();
        $Movies=$seller->movies()->orderBy('created_at','desc')->get();
        $Songs=$seller->songs()->where('album',0)->orderBy('created_at','desc')->get();
        $Albums= $seller->albums()->orderBy('created_at','desc')->get();

        if ($Movies==NULL) { $Movies=False; }
        if ($Tv==NULL) { $Tv=False; }
        if ($Radio==NULL) { $Radio=False; }
        if ($Megazines==NULL) { $Megazines=False; }
        if ($Albums==NULL) { $Albums=False; }
        if ($Songs==NULL) { $Songs=False; }  
        if($Book==NULL){ $Book=False; } 
        if($Series==NULL){ $Series=False;}
    
        $total_content = $tv_content+$radio_content+$megazine_content+$serie_content+$book_content+$movie_content+$musical_content;
        $total_aproved = $tv_aproved+$radio_aproved+$megazine_aproved+$serie_aproved+$book_aproved+$movie_aproved+$musical_aproved;
      
        $followers=count($seller->followers()->get());
        
        
        return view('seller.home')
                ->with('total_content',$total_content)
                ->with('total_aproved',$total_aproved)
                ->with('followers', $followers)
                ->with('tv_content',$tv_content)
                ->with('radio_content',$radio_content)
                ->with('megazine_content',$megazine_content)
                ->with('serie_content',$serie_content) 
                ->with('book_content',$book_content) 
                ->with('movie_content',$movie_content)
                ->with('musical_content',$musical_content)
                ->with('Songs',$Songs)
                ->with('Albums',$Albums)
                ->with('Movies',$Movies)
                ->with('Megazines',$Megazines)
                ->with('Book',$Book)
                ->with('Radio',$Radio)
                ->with('Tv',$Tv)
                ->with('Series',$Series)
                //->with('artist',$autor)
                ->with('modulos',$seller_modules);
    }

    //Funcion encargada de cargar los datos del formulario a la BD para el Registro completo
    public function CompleteRegistrationForm($id,$code) {
        $ApplysSellers = ApplysSellers::find($id);
        $seller = Seller::where('email',$ApplysSellers->email)->get();
        //dd(isset($seller[0]));
        if (isset($seller[0])) {
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
        $store_path = public_path().'/sellers/'.$nombre.$request->ruc.'/documents/';
        $name = $nombre.time().'.'.$request->file('adj_ruc')->getClientOriginalExtension();
        $request->file('adj_ruc')->move($store_path,$name);
        $real_path = '/sellers/'.$nombre.$request->ruc.'/documents/';
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
        $seller_roles = SellersRoles::where('name',$request->modulo)->get();
        $seller= Seller::find(Auth::guard('web_seller')->user()->id);
        $data = $seller->roles()->attach($seller_roles[0]->id);
        if ($request->modulo=="Peliculas") {
            $seller_roles = SellersRoles::where('name','Series')->get();
            $seller= Seller::find(Auth::guard('web_seller')->user()->id);
            $data = $seller->roles()->attach($seller_roles[0]->id);
        }
        if ($request->modulo=="Libros") {
            $seller_roles = SellersRoles::where('name','Revistas')->get();
            $seller= Seller::find(Auth::guard('web_seller')->user()->id);
            $data = $seller->roles()->attach($seller_roles[0]->id);
        }
        if ($request->submodulo!=null) {
            $seller_sub_roles = SellersRoles::where('name',$request->submodulo)->get();
            $data = $seller->roles()->attach($seller_sub_roles[0]->id);
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
      
        return view('seller.edit')  ->with('seller',$seller)
                                    ->with('total_content',$total_content)
                                    ->with('total_aproved',$total_aproved);
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
            $file1 = $request->file('adj_ruc');
            $name1 = 'ruc_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = public_path() . '/images/producer/ruc';
            $file1->move($path1, $name1);
            $seller->adj_ruc = '/images/producer/ruc/'.$name1;
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
        //$seller->address = $request->direccion;
        $seller->save();

        Flash::warning('Se ha modificado ' . $seller->name . ' de forma exitosa')->important();

        //return view('seller.edit')->with('seller',$seller);
        return redirect()->action('SellerController@homeSeller');

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
         $ordenBalance=collect($Balance)->sortBy('Date')->reverse()->toArray();

        return view('seller.MyBalance')->with('Balance',$ordenBalance)->with('diferido',$diferido);
    }

     public function Fondos(){
        $payment = PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->get();
        $diferido=PaymentSeller::where('seller_id','=',Auth::guard('web_seller')->user()->id)->where('status','=','Diferido')->sum('tickets');
        return view('seller.Fondos')->with('payment',$payment)->with('diferido',$diferido);
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

}
	