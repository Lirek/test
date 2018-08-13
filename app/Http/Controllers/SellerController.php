<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Seller Model
use App\Seller;
use App\ApplysSellers;
use Laracasts\Flash\Flash;
//use App\music_authors;

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
                    //dd($musical_content,$musical_aproved);
                    break;

                case 'Peliculas':
                    $movie_content = count($seller->movies()->get());
                    $movie_aproved = count($seller->movies()->where('status','Aprobado')->get());
                    //dd($movie_content,$movie_aproved);
                    break;
                
                case 'Libros':
                    $book_content = count($seller->Books()->get());
                    $book_aproved = count($seller->Books()->where('status','Aprobado')->get());
                    //dd($book_content,$book_aproved);
                    break;
                
                case 'Series':
                    $serie_content = count($seller->series()->get());
                    $serie_aproved = count($seller->series()->where('status','Aprobado')->get());
                    //dd($serie_content,$serie_aproved);
                    break;

                case 'Revistas':
                    $megazine_content = count($seller->Megazines()->get());
                    $megazine_aproved = count($seller->Megazines()->where('status','Aprobado')->get());
                    //dd($megazine_content,$megazine_aproved);
                    break;

                case 'Radios':
                    $radio_content = count($seller->Radio()->get());
                    $radio_aproved = count($seller->Radio()->where('status','Aprobado')->get());
                    //dd($radio_content,$radio_aproved);
                    break;

                case 'TV':
                    $tv_content = count($seller->Tv()->get());
                    $tv_aproved = count($seller->Tv()->where('status','Aprobado')->get());
                    //dd($tv_content,$tv_aproved);
                    break;
                
                default:
                    # code...
                    break;
            };

        };
        
        $total_content = $tv_content+$radio_content+$megazine_content+$serie_content+$book_content+$movie_content+$musical_content;
        //dd($total_content);
        $total_aproved = $tv_aproved+$radio_aproved+$megazine_aproved+$serie_aproved+$book_aproved+$movie_aproved+$musical_aproved;
        //dd($total_aproved);
        $followers=count($seller->followers()->get());
        //dd($followers);

        $user = Seller::find(Auth::guard('web_seller')->user()->id);
        $referals1 = $user->referals()->count();
        $referals2 = 0;
        $referals3 = 0;
        
        foreach ($user->referals()->get() as $key) {

            $referals = Seller::find($key->refered);
            $referals2 = $referals->referals()->count()+$referals2;

            foreach ($referals->referals()->get() as $key2) {

                $referals = Seller::find($key2->refered);
                $referals3 = $referals->referals()->count()+$referals3;
            }
        }

        //$autor = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();
        //dd(count($autor));
        
        return view('seller.home')
                ->with('total_content',$total_content)
                ->with('aproved_content',$total_aproved)
                ->with('followers', $followers)
                ->with('tv_content',$tv_content)
                ->with('tv_aproved',$tv_aproved)
                ->with('radio_content',$radio_content)
                ->with('radio_aproved',$radio_aproved)
                ->with('megazine_content',$megazine_content)
                ->with('megazine_aproved',$megazine_aproved)
                ->with('serie_content',$serie_content)
                ->with('serie_aproved',$serie_aproved)
                ->with('book_content',$book_content)
                ->with('book_aproved',$book_aproved)
                ->with('movie_content',$movie_content)
                ->with('movie_aproved',$movie_aproved)
                ->with('musical_content',$musical_content)
                ->with('musical_aproved',$musical_aproved)
                //->with('artist',$autor)
                ->with('modulos',$seller_modules)
                ->with('referals1',$referals1)
                ->with('referals2',$referals2)
                ->with('referals3',$referals3);
    }

    //Funcion Encargada de Cargar el Formulario para el Registro que completo
    public function CompleteRegistrationForm($id,$code)
    {
    	$ApplysSellers = ApplysSellers::find($id);
        
        if ($code == $ApplysSellers->token)
        {
            return view('seller.complete');    
        }
        else
        {
            flash()->error('El enlace procesado no corresponde a nuestors registros');
          return view('seller.auth.login');   
        }
        
    }

	//Funcion Encargada de Cargar los datos del formulario a la BD para el Registro que completo

    public function CompleteRegistration(Request $request)
    {   
        
        
        $store_path='documents/sellers/';      
        
        $path = $request->file('adj_ruc')->storeAs($store_path,$request->name.'.'.$request->file('adj_ruc')->getClientOriginalExtension());
    	$Seller= new Seller;
        $Seller->name = $request->name;
        $Seller->email = $request->email;
        $Seller->password = bcrypt($request->password);
        $Seller->estatus = 'Pre-Aprobado';
        $Seller->ruc_s = $request->ruc;
        $Seller->descs_s = $request->dsc;
        $Seller->adj_ruc = $path;
        $Seller->tlf = $request->tlf;
        $Seller->save();
        Auth::guard('web_seller')->login($Seller);

    
    	return view('seller.home')->with('total_content', 0)->with('aproved_content', 0)->with('followers', 0);
    }

    public function ShowMessages()
    {
        $user=Auth::guard('web_seller')->user()->id;
        
        return view('seller.messages');
    }

    public function edit($id)
    {
        $sellers = Seller::find($id);

        return view('seller.producer.edit')->with('seller',$sellers);
    }

    public function update(Request $request,$id)
    {
        $seller = Seller::find($id);

        if ($request->logo <> null) {
            $file = $request->file('logo');
            $name = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/producer/logo';
            $file->move($path, $name);
            $seller->logo = $name;
        }

        if ($request->adj_ruc <> null) {
            $file1 = $request->file('adj_ruc');
            $name1 = 'ruc_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = public_path() . '/images/producer/ruc';
            $file1->move($path1, $name1);
            $seller->adj_ruc = $name1;
        }

        if ($request->adj_ci <> null) {
            $file2 = $request->file('adj_ci');
            $name2 = 'ci_' . time() . '.' . $file2->getClientOriginalExtension();
            $path2 = public_path() . '/images/producer/ci';
            $file2->move($path2, $name2);
            $seller->adj_ci = $name2;
        }

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->tlf = $request->tlf;
        $seller->ruc_s = $request->ruc_s;

        $seller->save();

        Flash::warning('Se ha modificado ' . $seller->name . ' de forma exitosa')->important();

        return view('seller.producer.edit')->with('seller',$seller);
    }
    
}
	