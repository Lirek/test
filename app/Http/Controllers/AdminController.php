<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusApplys;
use App\Mail\PromoterAssing;
use App\Events\ContentAprovalEvent;
use App\Events\ContentDenialEvent;
use App\Events\PayementAprovalEvent;
use App\Events\PaymentDenialEvent;
use App\Events\PasswordPromoter;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use App\Events\AssingPointsEvents;
use File;

//-------------Modelos del sistema-----------------------
use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\Albums;
use App\Songs;
use App\User;
use App\Seller;
use App\Radio;
use App\Sagas;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\SellersRoles;
use App\Promoters;
use App\LoginControl;
use App\Salesman;
use App\PromotersRoles;
use App\TicketsPackage;
use App\Payments;
use App\Referals;
use App\PointsAssings;
use App\SistemBalance;

//--------------------------------------------------------

class AdminController extends Controller
{
	 

    public function SendEmails($status,$name,$seller,$reason)
    {
      if ($status =='Aprobado') 
        {
          event(new ContentAprovalEvent($name,$seller));
        }
        else
        {
          event(new ContentDenialEvent($name,$seller,$reason));
        }

        return true;
    }

/* 
-----------------------------------------------------------------
--------------------- FUNCIONES DE APROBAR ALBUM ----------------------
---------------------------------------------------------------
*/
    	public function ShowAlbums()
    	{	
    		return view('promoter.ContentModules.MainContent.Albums');
   		}

      public function AlbumsDataTable()
      {
          
        $albums= Albums::where('status','=','En Revision');

          return Datatables::of($albums)
                    ->addColumn('Estatus',function($albums){
                      
                      return '<button type="button" class="btn btn-theme" value='.$albums->id.' data-toggle="modal" data-target="#myModal" id="Status">'.$albums->status.'</button>';
                    })

                    ->addColumn('Autors_name',function($albums){
                      
                      return $albums->Seller()->first()->name;
                    })

                    ->addColumn('songs',function($albums){
                      
                      return '<button type="button" class="btn btn-theme" value="'.$albums->id.'" id="songs" >'.$albums->songs()->count().'</button';
                    })                    

                    ->editColumn('autors_id',function($albums){

                      return $albums->Autors()->first()->name;
                    })

                    ->editColumn('cover',function($albums){
                      

                      return '<img class="img-rounded img-responsive av" src="'.$albums->cover.'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="cover">';;
                    })
                    ->rawColumns(['Estatus','cover','songs'])
                    ->toJson();        
      }

      public function ShowAllAlbums()
      {
        $albums= Albums::where('status','=','Aprobado')->paginate(10);
        return view('admin.AllAlbums')->with('albums',$albums);
      }

   		public function AlbumSongs($id)
   		{
   			$albums= Albums::find($id);
   			$data= $albums->songs()->get();
   			return response()->json($data);
   		}

   		public function AlbumStatus(Request $request,$id)
   		{
   			$albums = Albums::find($id);
        $albums->status = $request->status;
        
          foreach ($albums->songs as $track) 
          {
            $track->status = 'Aprobado';
            $track->save();
          }

       $this->SendEmails($request->status,$albums->name_alb,$albums->Seller->email,$request->reazon);
			  
        $albums->save();
   			return response()->json($albums);
   		}
/*------------------------------------------------------------------------------------ ---------------------FUNCIONES DE SINGLE------------------------------
-----------------------------------------------------------------------
*/
   		public function ShowSingles()
    	{	
        return view('promoter.ContentModules.MainContent.Single');
   		}

      public function SinglesDataTable()
      {
         $Single= Songs::whereNull('album')->where('status','=','En Revision')->get();

                 return Datatables::of($Single)
                    ->addColumn('Estatus',function($Single){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Single->id.' data-toggle="modal" data-target="#myModal" id="Status">'.$Single->status.'</button';
                    })

                    ->addColumn('Autors_name',function($Single){
                      
                      return $Single->Seller()->first()->name;
                    })                    

                    ->editColumn('autors_id',function($Single){

                      return $Single->autors()->first()->name;
                    })

                    ->editColumn('song_file',function($Single){
                      

                      return '<audio controls="" src="'.$Single->song_file.'">
                                <source src="'.$Single->song_file.'" type="audio/mpeg">
                                </audio>';
                    })
                    ->rawColumns(['Estatus','photo','song_file'])
                    ->toJson();
      }

      public function ShowAllSingles()
      {
        $single= Songs::whereNull('album')->paginate(10);
        return view('admin.Single')->with('single',$single);
      }

   		public function SingleStatus(Request $request,$id)
   		{
   			$Single =Songs::find($id);
   			$Single->status = $request->status;

        $this->SendEmails($request->status,$Single->song_name,$Single->Seller->email,$request->reason);

			  $Single->save();
   			return response()->json($Single);
   		}

/*-------------------------------------------------------------------------
-----------------FUNCIONES DE ARTISTAS MUSICALES---------------------------
---------------------------------------------------------------------------
*/

   		public function ShowMusicianView()
    	{
    		return view('promoter.ContentModules.ExtraContent.Musician');
   		}

      public function MusicianDataTable()
      {
      
        $Musician = music_authors::where('status','=','En Proceso')
                              ->with('Seller')
                              ->get();



        return Datatables::of($Musician)
                    ->addColumn('Estatus',function($Musician){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Musician->id.' data-toggle="modal" data-target="#MusicianModal" id="Status">'.$Musician->status.'</button';
                    })
                    
                    ->addColumn('SocialMedia',function($Musician){
                      
                      return 
                      '<a target="_blank" href="http://'.$Musician->facebook.'>
                       <i class="fa fa-facebook-official" style="font-size:24px"></i>
                       </a>
                       <a target="_blank" href="http://'.$Musician->google.'">
                        <i class="fa fa-youtube-play" style="font-size:36px"></i>
                       </a>
                       <a target="_blank" href="http://'.$Musician->instagram.'">
                         <i class="fa fa-instagram" style="font-size:36px"></i>
                       </a>
                       <a target="_blank" href="http://'.$Musician->twitter.'">
                        <i class="fa fa-twitter" style="font-size:36px"></i>
                       </a>';
                    })
                    
                    ->editColumn('photo',function($Musician){

                      return '<img class="img-rounded img-responsive av" src="'.asset($Musician->photo).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->rawColumns(['Estatus','photo','SocialMedia'])
                    ->toJson();
      }

      public function ShowAllMusician()
      {
       
       $Musician = music_authors::where('status','=','Aprobado')
                              ->with('Seller')
                              ->get();



        return Datatables::of($Musician)
                    ->addColumn('Estatus',function($Musician){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Musician->id.' data-toggle="modal" data-target="#MusicianModal" id="Status">'.$Musician->status.'</button';
                    })
                    
                    ->addColumn('SocialMedia',function($Musician){
                      
                      return 
                      '<a target="_blank" href="http://'.$Musician->facebook.'>
                        <i class="fas fa-facebook-square fa-3x">
                       </a>
                       <a target="_blank" href="http://'.$Musician->google.'">
                        <i class="fas fa-youtube fa-3x"></i>
                       </a>
                       <a target="_blank" href="http://'.$Musician->instagram.'">
                         <i class="fas fa-instagram fa-3x"></i>
                       </a>
                       <a target="_blank" href="http://'.$Musician->twitter.'">
                        <i class="fas fa-twitter fa-3x"></i>
                       </a>';
                    })
                    
                    ->editColumn('photo',function($Musician){

                      return '<img class="img-rounded img-responsive av" src="'.asset($Musician->photo).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->rawColumns(['Estatus','photo','SocialMedia'])
                    ->toJson();
      }

   		public function MusicianStatus(Request $request,$id)
   		{
   			$musician =music_authors::find($id);
   			$musician->status = $request->status; 

        $this->SendEmails($request->status,$musician->name,$musician->Seller->email,$request->reaon);

			  $musician->save();
   			return response()->json($musician);
   		}

/*---------------------------------------------------------------------
---------------------------FUNCIONES DE RADIOS--------------------------
-----------------------------------------------------------------------
*/   		
  
   		public function ShowRadios()
    	{
        return view('promoter.ContentModules.MainContent.Radio');
   		}

      public function RadioDataTable()
      {
        $radios= Radio::where('status','=','En Proceso')->with('Seller')->get();

         return Datatables::of($radios)

                          ->addColumn('Estatus',function($radios){

                            return '<button type="button" class="btn btn-theme" value='.$radios->id.' data-toggle="modal" data-target="#myModal" id="status">'.$radios->status.'</button';
                          })
                          ->editColumn('logo',function($radios){

                          return '<img class="img-rounded img-responsive av" src="'.asset($radios->logo).'"
                                     style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                          })
                          ->editColumn('streaming',function($radios){
                      

                          return '<audio controls="" src="'.$radios->streaming.'">
                                    <source src="'.$radios->streaming.'" type="audio/mpeg">
                                    </audio>';
                         })
                          ->addColumn('SocialMedia',function($radios){
                      
                            return 
                            '
                             <a target="_blank" href="http://'.$radios->facebook.'>
                              <i class="fa fa-facebook-official" style="font-size:24px"><i class="fa fa-facebook" style="font-size:24px"></i></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->google.'">
                              <i class="fa fa-youtube-play" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->instagram.'">
                               <i class="fa fa-instagram" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->twitter.'">
                              <i class="fa fa-twitter" style="font-size:36px"></i>
                             </a>';
                    })
                          ->rawColumns(['Estatus','logo','streaming','SocialMedia'])
                          ->toJson();
      }

      public function BackendRadioData()
      {
        $radios= Radio::where('seller_id','=',0)->get();

         return Datatables::of($radios)

                          ->addColumn('Actions',function($radios){

                            return '<button type="button" class="btn-danger" value='.$radios->id.' data-toggle="modal" data-target="#DeleteRadio" id="delete">Eliminar</button>

                            <button type="button" class="btn btn-theme" value='.$radios->id.' data-toggle="modal" data-target="#UpadeRadio" id="edit">Modificar</button';
                          })
                          ->editColumn('logo',function($radios){

                          return '<img class="img-rounded img-responsive av" src="'.asset($radios->logo).'"
                                     style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                          })
                          ->editColumn('streaming',function($radios){
                      

                          return '<audio controls="" src="'.$radios->streaming.'">
                                    <source src="'.$radios->streaming.'" type="audio/mpeg">
                                    </audio>';
                         })
                          ->addColumn('SocialMedia',function($radios){
                      
                            return 
                            '<a target="_blank" href="http://'.$radios->facebook.'>
                              <i class="fa fa-facebook-official" style="font-size:24px"><i class="fa fa-facebook" style="font-size:24px"></i></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->google.'">
                              <i class="fa fa-youtube-play" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->instagram.'">
                               <i class="fa fa-instagram" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$radios->twitter.'">
                              <i class="fa fa-twitter" style="font-size:36px"></i>
                             </a>';
                    })
                          ->rawColumns(['Actions','logo','streaming','SocialMedia'])
                          ->toJson();

      }

      public function NewBackendRadios(Request $request)
      {
        $Radio = new Radio;
        
            $file = $request->file('logo');
            $name = 'radiologo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/radio/';
            $file->move($path, $name);
            $logos = '/images/radio/'.$name;

        $Radio->seller_id = 0;

        $Radio->name_r = $request->name_r;
        
        $Radio->streaming = $request->streaming;
        
        $Radio->email_c = $request->email_c;
        
        $Radio->google = $request->youtube;
        
        $Radio->instagram = $request->instagram;
        
        $Radio->facebook = $request->facebook;
        
        $Radio->twitter = $request->twitter;
        
        $Radio->logo = $logos;

        $Radio->status ='Aprobado';
        
        $Radio->save();

        return redirect()->action('AdminController@ShowRadios');

      }

      public function DeleteBackendRadio($id)
      {
        $radios = Radio::destroy($id);
        return response()->json($radios);
      }

      public function GetBackendRadio($id)
      {
        $radios = Radio::find($id);
        $radios->logo = asset($radios->logo);
        return response()->json($radios);
      }

      public function UpdateBackendRadio(Request $request,$id)
      {
        $Radio= Radio::find($id);
        //dd($request->all());
        if($request->logo_u != null)
        {
            
            $file = $request->file('logo_u');
            $name = 'radiologo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/radio/';
            $file->move($path, $name);
          
            $Radio->logo = '/images/radio/'.$name;
         }         

        $Radio->name_r = $request->name_r_u;
        
        $Radio->streaming = $request->streaming_u;
        
        $Radio->email_c = $request->email_c_u;
        
        $Radio->google = $request->youtube_u;
        
        $Radio->instagram = $request->instagram_u;
        
        $Radio->facebook = $request->facebook_u;
        
        $Radio->twitter = $request->twitter_u;
        
        $Radio->save();

        return redirect()->action('AdminController@ShowRadios');
      }

      public function ShowAllRadios()
      {
        $radios= Radio::paginate(10);
        return view('admin.Radio')->with('radios',$radios);
      }

   		public function RadioStatus(Request $request,$id)
   		{
   			$radios =Radio::find($id);
   			$radios->status = $request->status; 
          
          $this->SendEmails($request->status,$radios->name,$radios->Seller->email);

			  $radios->save();
   			return response()->json($radios);
   		}

/*--------------------------------------------------------------------------
-----------------------------FUNCIONES DE REVISTAS----------- --------------
----------------------------------------------------------------------------
*/
   		public function ShowMegazine()
    	{
        return view('promoter.ContentModules.MainContent.Megazine');
   		}

      public function MegazineDataTable()
      {
        $megazines= Megazines::where('status','=','En Revision')->get();

        return Datatables::of($megazines)
                    ->addColumn('Estatus',function($megazines){
                      
                      return '<button type="button" class="btn btn-theme" value='.$megazines->id.' data-toggle="modal" data-target="#myModal" id="status">'.$megazines->status.'</button';
                    })
                    ->editColumn('megazine_file',function($megazines){

                      return '<button type="button" class="btn btn-theme" value='.$megazines->megazine_file.' data-toggle="modal" data-target="#file" id="file_b"></button';
                    })
                    ->editColumn('cover',function($megazines){

                      return '<img class="img-rounded img-responsive av" src="'.asset($megazines->cover).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->editColumn('saga_id',function($megazines){
                      
                      if($megazines->saga_id == 0 or $megazines->saga_id == 'NULL')
                          {
                            return 'No';
                          }
                          else
                          {
                            return $megazines->sagas()->first()->sag_name;
                          }
    
                    
                    })
                    ->editColumn('rating_id',function($megazines){

                    return $megazines->Rating()->first()->r_name;

                    })
                    ->editColumn('seller_id',function($megazines){

                    return $megazines->Seller()->first()->name;

                    })
                    ->rawColumns(['Estatus','megazine_file','cover'])
                    ->toJson();

      }

      public function ShowAllMegazine()
      {
        $megazines= Megazines::paginate(10);
        return view('admin.Megazine')->with('megazines',$megazines);
      }      

   		public function ShowPublicationChain()
    	{
    		
        $saga = Sagas::where('status','=','En Proceso')->where('type_saga','=','Revistas')->get();

        return Datatables::of($saga)
                    ->addColumn('Estatus',function($saga){
                      
                      return '<button type="button" class="btn btn-theme" value='.$saga->id.' data-toggle="modal" data-target="#PubModal" id="Status">'.$saga->status.'</button';
                    })
                    ->editColumn('img_saga',function($saga){

                      return '<img class="img-rounded img-responsive av" src="'.asset($saga->img_saga).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->editColumn('seller_id',function($saga){

                      return $saga->Seller()->first()->name;
                    })
                    ->editColumn('rating_id',function($saga){

                      return $saga->Rating()->first()->r_name;
                    })
                    ->rawColumns(['Estatus','img_saga'])
                    ->toJson();

    		
   		}

      public function ShowAllPublicationChain()
      {
        $saga = Sagas::where('type_saga','=','Revistas')->paginate(10);
        return view('admin.PubChain')->with('sagas',$saga);
      }

   		public function PublicationChainStatus(Request $request,$id)
    	{
    		$saga = Sagas::find($id);
	   		$saga->status = $request->status;

        $this->SendEmails($request->status,$saga->sag_name,$saga->seller->email,$request->message);

			  $saga->save();
   			return response()->json($saga);
   		}

   		public function MegazineStatus(Request $request,$id)
    	{
			  $megazines = Megazines::find($id);
	   		$megazines->status = $request->status; 

        $this->SendEmails($request->status,$megazines->title,$megazines->Seller->email,$request->message);        

			  $megazines->save();
   			return response()->json($megazines);
   		}
 
 /*-----------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE TV---- ----------- ----------
------------------------------------------------------------------------
*/ 		
   		
	   	public function ShowTV()
    	{
    		return view('promoter.ContentModules.MainContent.Tv');
   		}

      public function DataTableTv()
      {
        $tv= Tv::where('status','=','En Proceso')->get();

        return Datatables::of($tv)

                          ->addColumn('Estatus',function($tv){

                            return '<button type="button" class="btn btn-theme" value='.$tv->id.' data-toggle="modal" data-target="#myModal" id="status">'.$tv->status.'</button';
                          })
                          ->editColumn('logo',function($tv){

                          return '<img class="img-rounded img-responsive av" src="/images/radio/"'.$tv->logo.'"
                                     style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                          })
                          ->editColumn('streaming',function($tv){
                      

                          return '<button type="button" class="btn btn-theme" value='.$tv->streaming.' data-toggle="modal" data-target="#ShowStreaming" id="view">Ver</button';
                         })
                          ->addColumn('SocialMedia',function($tv){
                      
                            return 
                            '<a target="_blank" href="http://'.$tv->facebook.'>
                             <i class="fa fa-facebook-official" style="font-size:24px"></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->google.'">
                              <i class="fa fa-youtube-play" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->instagram.'">
                               <i class="fa fa-instagram" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->twitter.'">
                              <i class="fa fa-twitter" style="font-size:36px"></i>
                             </a>';
                    })
                          ->rawColumns(['Estatus','logo','streaming','SocialMedia'])
                          ->toJson();
      }

      public function BackendTvData()
      {
        $tv= Tv::where('seller_id','=',0)->get();

         return Datatables::of($tv)

                          ->addColumn('Actions',function($tv){

                            return '<button type="button" class="btn-danger" value='.$tv->id.' data-toggle="modal" data-target="#DeleteRadio" id="delete">Eliminar</button>

                            <button type="button" class="btn btn-theme" value='.$tv->id.' data-toggle="modal" data-target="#UpadeRadio" id="edit">Modificar</button';
                          })
                          ->editColumn('logo',function($tv){

                          return '<img class="img-rounded img-responsive av" src="'.asset($tv->logo).'"
                                     style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                          })
                          ->editColumn('streaming',function($tv){
                      

                          return '<button type="button" class="btn btn-theme" value='.$tv->streaming.' data-toggle="modal" data-target="#ShowStreaming" id="view">Ver</button';
                          
                         })
                          ->addColumn('SocialMedia',function($tv){
                      
                            return 
                            '<a target="_blank" href="http://'.$tv->facebook.'>
                              <i class="fa fa-facebook-official" style="font-size:24px"><i class="fa fa-facebook" style="font-size:24px"></i></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->google.'">
                              <i class="fa fa-youtube-play" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->instagram.'">
                               <i class="fa fa-instagram" style="font-size:36px"></i>
                             </a>
                             <a target="_blank" href="http://'.$tv->twitter.'">
                              <i class="fa fa-twitter" style="font-size:36px"></i>
                             </a>';
                    })
                          ->rawColumns(['Actions','logo','streaming','SocialMedia'])
                          ->toJson();

      }

       public function NewBackendTv(Request $request)
      {
        $Tv = new Tv;
        
            $file = $request->file('logo');
            $name = 'Tvlogo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/Tv/';
            $file->move($path, $name);
            $logos = '/images/Tv/'.$name;

        $Tv->seller_id = 0;

        $Tv->name_r = $request->name_r;
        
        $Tv->streaming = $request->streaming;
        
        $Tv->email_c = $request->email_c;
        
        $Tv->google = $request->youtube;
        
        $Tv->instagram = $request->instagram;
        
        $Tv->facebook = $request->facebook;
        
        $Tv->twitter = $request->twitter;
        
        $Tv->logo = $logos;

        $Tv->status ='Aprobado';
        
        $Tv->save();

        return redirect()->action('AdminController@ShowTV');

      }

      public function DeleteBackendTv($id)
      {
        $Tv = Tv::destroy($id);
        return response()->json($Tv);
      }

      public function GetBackendTv($id)
      {
        $Tv = Tv::find($id);
        $Tv->logo = asset($Tv->logo);
        return response()->json($Tv);
      }

      public function UpdateBackendTv(Request $request,$id)
      {
        $Tv= Tv::find($id);
        //dd($request->all());
        if($request->logo_u != null)
        {
            
            $file = $request->file('logo_u');
            $name = 'radiologo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/Tv/';
            $file->move($path, $name);
          
            $Tv->logo = '/images/Tv/'.$name;
         }         

        $Tv->name_r = $request->name_r_u;
        
        $Tv->streaming = $request->streaming_u;
        
        $Tv->email_c = $request->email_c_u;
        
        $Tv->google = $request->youtube_u;
        
        $Tv->instagram = $request->instagram_u;
        
        $Tv->facebook = $request->facebook_u;
        
        $Tv->twitter = $request->twitter_u;
        
        $Tv->save();

        return redirect()->action('AdminController@ShowTV');
      }


      public function ShowAllTV()
      {
        $tv= TV::paginate(10);
        return view('admin.TV')->with('TVS',$tv);
      }

   		public function TvStatus(Request $request,$id)
   		{
   			$tv =TV::find($id);
   			$tv->status = $request->status;

        $this->SendEmails($request->status,$tv->name_r,$tv->Seller->email);

			  $tv->save();
   			return response()->json($tv);
   		}

/*--------------------------------------------------------------------------------
-----------------------FUNCIONES DE LIBROS-----------------------------------
-----------------------------------------------------------------------
*/   		
  public function ShowBooks()
  {
        return view('promoter.ContentModules.MainContent.Books');
  }

  public function BooksDataTable()
  {
    $Books= Book::where('status','=','En Revision')->get();
    return Datatables::of($Books)
                    ->addColumn('Estatus',function($Books){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Books->id.' data-toggle="modal" data-target="#myModal" id="status">'.$Books->status.'</button';
                    })
                    ->editColumn('books_file',function($Books){

                      return '<button type="button" class="btn btn-theme" value='.$Books->books_file.' data-toggle="modal" data-target="#file" id="file_b"></button';
                    })
                    ->editColumn('cover',function($Books){

                      return '<img class="img-rounded img-responsive av" src="'.asset($Books->cover).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->editColumn('saga_id',function($Books){
                      
                      if($Books->saga_id == 0 or $Books->saga_id == 'NULL')
                          {
                            return 'No';
                          }
                          else
                          {
                            return $Books->sagas->sag_name;
                          }
    
                    
                    })
                    ->editColumn('author_id',function($Books){
                      
                        return $Books->author()->first()->full_name;

                    })
                    ->editColumn('rating_id',function($Books){

                    return $Books->rating->r_name;

                    })
                    ->editColumn('seller_id',function($Books){

                    return $Books->seller->name;

                    })
                    ->rawColumns(['Estatus','books_file','cover'])
                    ->toJson();
         
  }

  public function BooksSagasDataTable()
  {
    $saga = Sagas::where('status','=','En Proceso')->where('type_saga','=','Libros')->get();

        return Datatables::of($saga)
                    ->addColumn('Estatus',function($saga){
                      
                      return '<button type="button" class="btn btn-theme" value='.$saga->id.' data-toggle="modal" data-target="#PubModal" id="Status">'.$saga->status.'</button';
                    })
                    ->editColumn('img_saga',function($saga){

                      return '<img class="img-rounded img-responsive av" src="'.asset($saga->img_saga).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->editColumn('seller_id',function($saga){

                      return $saga->Seller()->first()->name;
                    })
                    ->editColumn('rating_id',function($saga){

                      return $saga->Rating()->first()->r_name;
                    })
                    ->rawColumns(['Estatus','img_saga'])
                    ->toJson();
  }

  public function EstatusBooks(Request $request,$id)
  {
        $Book = Book::find($id);
        $Book->status = $request->status; 

        $this->SendEmails($request->status,$Book->title,$Book->seller->email,$request->message);        

        $Book->save();
        return response()->json($Book);
  }
 /*---------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------FUNCIONES DE PROVEEDORES----------------------------------
--------------------------------------------------------------------------------------
*/


	   	public function ShowSellers()
    	{
    		$sellers= Seller::paginate(10);
    		
    		$acces_modules=SellersRoles::all();


    		return view('promoter.AdminModules.Sellers')->with('sellers',$sellers)->with('acces_modules',$acces_modules);
   		}

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

      public function AddPromoterToSeller(Request $request,$id)
      {
        $seller= Seller::find($id);

        if ($seller->promoter_id == 0) 
        {
            $seller->estatus='Pre-Aprobado';
        }

        $seller->promoter_id=$request->promoter_id;

        $data = $seller->save();

        return response()->json($data);
      }

      public function RemovePromoterFromSeller($id_seller,$id_promoter)
      {
        $seller= Seller::find($id_seller);
        $seller->promoter_id=0;
        $data = $seller->save();
        return response()->json($data); 
      }

      public function AproveOrDenialSeller(Request $request,$id)
      {
        if ($request->status=='Rechazado') 
        {
          $seller= Seller::find($id);
          
          $data=$seller->delete();          
        }
        else
        {
          $seller= Seller::find($id);
          $seller->estatus=$request->status;          
          $data=$seller->save();
        }
          return response()->json($data);          
      }
//-------------Mostrar Solicitudes ---------------------------------
   		
      public function ShowApplys()
    	{
    		$applys= ApplysSellers::paginate(10);
    		
    		$Salesmans = Salesman::all();
    		
    		return view('promoter.AdminModules.Applys')->with('applys',$applys)->with('salesmans',$Salesmans);
   		}
//-------------------------------------------------------------------------------

//-----------------------CRUD PROMOTORES------------------------------------

   		public function CreatePromoter(Request $request)
   		{
   			$promoter = new Promoters;
   			
        $promoter->name_c =$request->name_c;
   			
        $promoter->phone_s =$request->phone_s;
   			
        $promoter->email= $request->email_c;

        $promoter->priority = $request->priority;
          
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          
          $charactersLength = strlen($characters);
          
          $randomString = '';
        
              for ($i = 0; $i < 6; $i++) 
                  {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                  }


   			$promoter->password=bcrypt($randomString);

        event( new PasswordPromoter($promoter->email,$randomString));

        $promoter->save();

        $promoter->Roles()->attach($request->priority);   

        return response()->json($promoter);
   		}

   		public function UpdatePromoter(Request $request, $id)
   		{
   			$promoter = Promoters::find($id);
   			$promoter->name_c =$request->name_c;
   			$promoter->phone_s =$request->phone_s;
   			$promoter->email= $request->email_c;
   			$promoter->save();
   			return response()->json($promoter);
   		}

   		public function DeletePromoter($id)
   		{
   			$promoter = Promoters::destroy($id);
   			return response()->json($promoter);
   		}
//-----------------------------------------------------------------------------

  		public function AddSalesmanToApllys(Request $request, $id)
  		{
  			$applys = ApplysSellers::find($id);

        $Salesman = Salesman::find($request->promoter_n);


  			$applys->salesman_id = $Salesman->id;

        $applys->promoter_id = Auth::guard('Promoter')->user()->id;

  			$applys->assing_at = $current = Carbon::now();
       
        Mail::to($applys->email)->subject('Estamos Procesando su Solicitud')->send(new PromoterAssing($applys));

        $applys->save(); 
        
          
        
        			
        return response()->json($applys); 
  		}

  		public function DeleteSalesmanFromApllys($id_apply,$id_promoter)
  		{
  			$applys= ApplysSellers::find($id_apply);
  			$applys->salesman_id= NULL;
  			$applys->save();
  			return response()->json($applys);	
  		}

  		public function StatusApllys($id,Request $request )
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
  				
  				
  				Mail::to($applys->email)->subject('Estado de Solicitud')->send(new StatusApplys($applys,$request->message));

  				$applys->save();
  				return response()->json($applys);	
  			}
        else
        {   
            Mail::to($applys->email)->subject('Estado de Solicitud')->send(new StatusApplys($applys,$request->message));
            $applys->save();
           return response()->json($applys);
            
        }	
  		}

      public function DeleteApplysFromPromoter($promoter,$applys)
      {
        $Applys = ApplysSellers::find($applys);
        $Applys->promoter_id = NULL;
        $Applys->save();
        return response()->json($Applys);
      }

      public function ShowBackendUsers()
      {
        

        $promoters= Promoters::paginate()->where('priority','>',Auth::guard('Promoter')->user()->priority);


        $priority= PromotersRoles::all();

        $Salesmans = Salesman::all();
        

        return view('promoter.AdminModules.BackendUsers')
                                            ->with('promoters',$promoters)
                                            ->with('salesmans',$Salesmans)
                                            ->with('priority',$priority);
      }
//------------------SALESMAN CRUD--------------------------------------------
      
      public function RegisterSalesman(Request $request)
      {
        $salesman = new Salesman;
        $salesman->name = $request->name;
        $salesman->adress = $request->adress;
        $salesman->phone = $request->phone;
        $salesman->email = $request->email;
        $salesman->promoter_id =Auth::guard('Promoter')->user()->id;
        $salesman->save();
        
        return response()->json($salesman->with('CreatedBy')->findOrFail(1));
      }

      public function DeleteSalesman($id)
      {
        $salesman= Salesman::destroy($id);        

        return response()->json($salesman); 
      }

      public function FindSalesman($id)
      {
        $salesman= Salesman::find($id);

        return response()->json($salesman);

      }

      public function UpadateSalesman(Request $request, $id)
      {
        $salesman= Salesman::find($id);
        $salesman->name = $request->name;
        $salesman->adress = $request->adress;
        $salesman->phone = $request->phone;
        $salesman->email = $request->email;
        $salesman->save();

        return response()->json($salesman);
      }

//-----------------------------------------------------------------------

//-----------------------Users Acctions-------------------------

      public function ShowPendingClients()
      {
        return view('promoter.AdminModules.Clients');
      }

      public function ClientsData()
      {
          $user=User::where('verify','=','0')
                                             ->where('img_doc','<>','NULL')
                                             ->where('num_doc','<>','NULL')
                                             ->get(); 
             return Datatables::of($user)
                    ->addColumn('Estatus',function($user){
                      
                      return '<button type="button" class="btn btn-theme" value='.$user->id.' data-toggle="modal" data-target="#myModal" id="Status">En Proceso</button';
                    })

                    ->addColumn('webs',function($user){
                      
                      return '<button type="button" class="btn btn-theme" value='.$user->id.' data-toggle="modal" data-target="#webModal" id="webs">Ver Redes</button';
                    })                                        
                    
                    ->editColumn('img_doc',function($user){

                      return '<button value='.$user->id.' data-toggle="modal" data-target="#ciModal" id="file_b">
                      <img class="img-rounded img-responsive av" src="'.asset($user->img_doc).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo'.$user->id.'"> 
                                 </button>';
                    })
                    ->editColumn('name',function($user){
                       return $user->name.' '.$user->last_name; 
                    })
                    ->rawColumns(['Estatus','img_doc','webs'])
                    ->toJson();                                           
      }

      public function ValidateUser(Request $request,$id)
      {
        $User= User::find($id);
        
        if ($request->status == 'Aprobado')
          {
            $User->verify=1;  
          }
           else
          {
          $User->verify=0; 
          }

        $User->save();

        return response()->json($User);
      }

      public function WebsDataTable($id)
      {
          $user= User::find($id);
          $x=$user->Referals()->get();
          $referals1 = [];
          $referals2= [];
          $referals3= [];
          $WholeReferals = new Collection; 
          
          if ($user->Referals()->get()->isEmpty()) 
          {
            return Datatables::of($WholeReferals);
          }
          foreach ($user->Referals()->get() as $key) 
          {
              $referals1[]=$key->refered;
              $WholeReferals->prepend(User::find($key->refered));
          }

          if (count($referals1)>0) 
              { 
                
                foreach ($referals1 as $key2) 
                 {  
                    $joker = User::find($key2);
                    
                    foreach($joker->Referals()->get() as $key2)
                     {
                       $referals2[]=$key2->refered;
                       $WholeReferals->prepend(User::find($key2->refered));
                     }                  
                 }
              }
          else
              {
                $referals2=0;
              }   


                               
          if (count($referals2)>0) 
              {
                foreach ($referals2 as $key3) 
                {
                  $joker = User::find($key3);
                    
                    foreach($joker->Referals()->get() as $key3)
                     {
                       $referals3[]=$key3->refered;
                       $WholeReferals->prepend(User::find($key3->refered));                       
                     }         
                }
              }

          else
              {
                $referals3=0;
              }   

                        
                          
            $WholeReferals->map(function ($item) use($referals1,$referals2,$referals3){
                        
              if (in_array($item->id, $referals1)) { return $item->level=1;}
              if (in_array($item->id, $referals2)) { return $item->level=2;}
              if (in_array($item->id, $referals3)) { return $item->level=3;}
                      });         
              
        return Datatables::of($WholeReferals)->toJson();              
      }

//------------------------------------------------------------------

//---------Pauetes de Tiques
      
      public function UpdatePackage($id, Request $request)
      {
        $Pack=TicketsPackage::find($id);
        $Pack->name= $request->name;
        $Pack->points_cost=$request->pointsCost;
        $Pack->points=$request->points;
        $Pack->cost= $request->cost;
        $Pack->amount= $request->ammount; 
        $Pack->save();

        return response()->json($Pack);
      }

      public function GetPackage($id)
      {        
        $Pack=TicketsPackage::find($id);

          return response()->json($Pack); 
      }

      public function SavePackage(Request $request)
      {
        
        $NPack= new TicketsPackage;
        $NPack->name= $request->name;
        $NPack->points_cost=$request->pointsCost;
        $NPack->points=$request->points;
        $NPack->cost= $request->cost;
        $NPack->amount= $request->ammount; 
        $NPack->save();
        
        return response()->json($NPack);
      }

      public function DeletePackage($id)
      {
        $Pack=TicketsPackage::destroy($id);
        return response()->json($Pack);
      }

//--------------------------------

//-----------------Validacion de Pagos----------------------
      public function DepsitDataTable()
      {
        $deposit = Payments::where('status','=','En Revision')->with('TicketsUser')->with('Tickets');

        return Datatables::of($deposit)
                                    ->editColumn('voucher',function($deposit){

                      return ' <button value='.$deposit->id.' data-toggle="modal" data-target="#ciModal" id="file_b">
                      <img class="img-rounded img-responsive av" src="'.asset($deposit->voucher).'" 
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo'.$deposit->id.'"> 
                                 </button> ';
                    })
                    ->editColumn('user_id',function($deposit){

                      return $deposit->TicketsUser->name;
                    })
                    ->addColumn('Estatus',function($deposit){
                      
                      return '<button type="button" class="btn btn-theme" value='.$deposit->id.' data-toggle="modal" data-target="#PayModal" id="payval">En Proceso
                      </button';
                    })
                     ->addColumn('total',function($deposit){
                      
                      return $deposit->value*$deposit->Tickets->cost.'$';
                    })
                      ->rawColumns(['Estatus','voucher'])
                      ->toJson();
      }

      public function DepositStatus($id,Request $request)
      {
        
        $deposit = Payments::find($id);
        
        
        if($request->status == 'Aprobado')
        {

          $user = User::find($deposit->user_id);
         
          $tickets =  $deposit->value*$deposit->Tickets->amount;

          $user->credito =$user->credito + $tickets;
         
          $user->save();
         
          $deposit->status = 'Aprobado';
         
          $deposit->save();
        
          $Condition=Carbon::now()->firstOfMonth()->toDateString();

          $revenueMonth = Payments::where('user_id','=',$deposit->user_id)
            ->where('created_at', '>=',$Condition)
            ->where('status', '=','Aprobado')
            ->get();
          
          $balance=  SistemBalance::find(1);

          $balance->tickets_solds = $balance->tickets_solds + $deposit->Tickets->amount;

          $balance->save();

          if ($revenueMonth->count()<=1) 
          {
           event(new AssingPointsEvents($user->id,$deposit->package_id));
          }
          


          event(new PayementAprovalEvent($user->email));
          
          return response()->json($user);
        }
        else
        {
           $user = User::find($deposit->user_id);
           $deposit->status = 'Denegado';
           $deposit->save();
           event(new PaymentDenialEvent($user->email,$request->message));
           return response()->json($deposit);

        }
      }


//------------------------------------------------------------

//--------------------------Funcion de Pruueba----------------
    public function test()
      {
        
      }
//-------------------------------------------------------------


}
