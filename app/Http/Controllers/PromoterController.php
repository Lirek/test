<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusApplys;
use App\Mail\PromoterAssing;
use DB;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Laracasts\Flash\Flash;


//-------------Modelos del sistema-----------------------
use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\TicketsPackage;
use App\Albums;
use App\Songs;
use App\User;
use App\Seller;
use App\Radio;
use App\Sagas;
use App\BookAuthor;
use App\Book;
use App\Movie;
use App\Tv;
use App\Serie;
use App\music_authors;
use App\SellersRoles;
use App\Promoters;
use App\LoginControl;

//-----------------------------------------------------

class PromoterController extends Controller
{
    public function index() {
      $id = Auth::guard('Promoter')->user()->id;
      $promoter = Promoters::find($id);
      $aplyss = ApplysSellers::where('status','En Proceso')->count();
      $sellers = Seller::where('estatus','En Proceso')->count();
      $user = Seller::all();
      $content_total=0;
      $TicketsPackage = TicketsPackage::all();
      $albums = Albums::where('status','En Revision')->count();
      $books = Book::where('status','En Revision')->count();
      $bookAuthor = BookAuthor::where('status','En Revision')->count();
      $megazines = Megazines::where('status','En Revision')->count();
      $movies = Movie::where('status','En Proceso')->count();
      $musicAuthors = music_authors::where('status','En Proceso')->count();
      $publicationChain = Sagas::where('status','En Proceso')->where('type_saga','Revistas')->count();
      $radios= Radio::where('status','En Proceso')->count();
      $sagaBooks = Sagas::where('status','En Proceso')->where('type_saga','Libros')->count();
      $series = Serie::where('status','En Proceso')->count();
      $singles = Songs::where('status','En Revision')->whereNull('album')->count();
      $tv = Tv::where('status','En Proceso')->count();
      $contenidoPendiente = $albums+$books+$bookAuthor+$megazines+$movies+$musicAuthors+$publicationChain+$sagaBooks+$radios+$series+$singles+$tv;
      return view('promoter.home')
              ->with('id',$id)
              ->with('promoter',$promoter)
              ->with('sellers',$sellers)
              ->with('aplyss',$aplyss)
              ->with('content_total',$contenidoPendiente)
              ->with('TicketsPackage',$TicketsPackage);

      /*
      foreach ($user as $key1) {
        if ($key1->has('sagas')) {
          $content_total=$content_total+$key1->sagas()->where('status','=','En Revision')->count();
        }
        if ($key1->has('MusicAuthors')) {
          $content_total=$content_total+$key1->MusicAuthors()->where('status','=','En Proceso')->count();   
        }
        if ($key1->has('BooksAuthors')) {
          $content_total=$content_total+$key1->BooksAuthors()->where('status','=','En Revision')->count();    
        }
        if ($key1->has('Tags')) {
          $content_total=$content_total+$key1->Tags()->where('status','=','En Proceso')->count();   
        }
        //dd($key1->roles->has('roles') != FALSE);
        if ($key1->roles->has('roles') != FALSE) {
          foreach ($content->roles() as $modules) {
            switch ($role->name) {
              case 'Musica':
                $Musica = $key1->albums()->where('status','=','En Revision')->count();
                $songs = 0;
                foreach ($key1->songs()->where('status','=','En Revision')->get() as $key) {
                  if ($key->album =! NULL or $key->album =! 0) {
                    $songs++;
                  }
                }
                $content_total=$Musica+$songs;
              break;
              case 'Peliculas':
                $Movies_content=0;
              break;
              case 'Libros':
                $Books_content=$key1->Books()->where('status','=','En Revision')->count();
                $content_total=$Books_content+$content_total;
              break;
              case 'Series':
                $series_content=0;
              break;
              case 'Revistas':
                $Megazine_content=$key1->Megazines()->where('status','=','En Revision')->count();
                $content_total=$Megazine_content+$content_total;
              break;
              case 'Radios':
                $radios_content=$key1->Radio()->where('status','=','En Proceso')->count();
                $content_total=$radios_content+$content_total;
              break;
              case 'TV':
                $aproved_tv=$key1->Tv()->where('status','=','En Proceso')->count();
                $content_total=$aproved_tv+$content_total;
              break;
            };
          }
        }
      }
      */
    }

    public function ShowSellers()
    {
        $sellers= Seller::where('promoter_id','=',Auth::guard('Promoter')->user()->id)->paginate(10);
      
        $acces_modules=SellersRoles::all();

        return view('promoter.Sellers')->with('sellers',$sellers)->with('acces_modules',$acces_modules);
    }

    //AJAX DEL PANEL DE PROVEEDORES----------------------------------------------------------------------------

      public function DeleteModule($id_seller,$id_module)
      {
        $seller= Seller::find($id_seller);
 
        $data = $seller->roles()->detach($id_module);

      return response()->json($data);
      
      }

      public function AddModule(Request $request,$id)
      {
        $seller= Seller::find($id);
        $data = $seller->roles()->attach($request->acces);

      return response()->json($data);
      
      }

      public function UpadteStatusSeller(Request $request,$id)
      {
        $seller= Seller::find($id);
        $seller->estatus=$request->status;
        $seller->save();
        $data = $seller;

      return response()->json($data);
      
      }

      public function edit()  
    {
        $id = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);
    
        return view('promoter.edit')->with('promoter', $promoter);
    }

     public function update(Request $request)
    {
        $id = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);

        $promoter->name_c = $request->name_c;
        $promoter->phone_S = $request->phone_s;

        $promoter->save();

        Flash('Se han modificado sus datos con exito!')->success();
        return redirect()->action('PromoterController@edit');
    }
  
      public function changepassword(Request $request, $id)
    {
        //$promoter = Auth::guard('Promoter')->user()->id;
        $promoter = Promoters::find($id);

        $promoter->password = $request->password;
        $oldpass = $request->oldpass;
        $newpass = $request->newpass;
        $confnewpass = $request->confnewpass;
        $pass_encrypt = ($request->password);

        if (password_verify($oldpass, $promoter->password))
          { 
        
        if ($newpass == $confnewpass) {

              $promoter->password = bcrypt($newpass);

              $promoter->save();

            Flash::success('Se ha modificado su contraseña con exito!')->success();
            return redirect()->action('PromoterController@edit'); 
                     
        } 
        
        else 
    
          Flash::success('Su nueva contraseña ingresada no coincide con la verificación, Por favor intentelo de nuevo.')->success();
            return redirect()->action('PromoterController@edit');

          }

        else 

          Flash::success('Ha ingresado su contraseña antigua incorrectamente, por favor intentelo de nuevo.')->success();
          return redirect()->action('PromoterController@edit');
    }


    //---------------------------------------------------------------------------------------------------------

    public function ShowContent()
    {
      
    }


    public function ShowApplys()
    {
        $applys= ApplysSellers::where('promoter_id','=',Auth::guard('Promoter')->user()->id)->paginate(10);
        
        return view('promoter.Applys')->with('applys',$applys);
    }

//--------AJAX DE SOLICITUDES DE CUENTA-------------------------------------------------
    public function StatusApllys(Request $request, $id)
    {
      $applys= ApplysSellers::find($id);
      $applys->status = $request->status;
      
      if ($request->status == 'Aprobado') 
      {
      
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
        
              for ($i = 0; $i < 10; $i++) 
                  {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                  }
  
        $applys->token= $randomString;
      
        $current = Carbon::now();
  
        $applys->expires_at= $current->addDays(7);
        
        $applys->save();
        
        Mail::to($applys->email_c)->send(new StatusApplys($applys,$request->message));

        return response()->json($applys); 
      }
          else
          {
            Mail::to($applys->email_c)->send(new StatusApplys($applys,$request->message));
            $applys->save();  
          }
      
  
      
    
      return response()->json($applys);
    }
//--------------------------------------------------------------------------------------

}
