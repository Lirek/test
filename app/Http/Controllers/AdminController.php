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
use App\Events\PasswordPromoter;
use Yajra\Datatables\Datatables;



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

/*-------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------
--------------------                             .............................................
--------------------- FUNCIONES DE APROBAR ALBUM --------------------------------------------
----------------------                            ------------------------------------------
--------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------
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
                      
                      return '<button type="button" class="btn btn-theme" value='.$albums->id.' data-toggle="modal" data-target="#myModal" id="Status">'.$albums->status.'</button';
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
/*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE SINGLE -------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
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

/*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE ARTISTAS MUSICALES -------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
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

/*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE RADIOS ----------- -------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
*/   		
  
   		public function ShowRadios()
    	{
    		$radios= Radio::where('status','=','En Proceso')->paginate(10);
    		return view('admin.Radio')->with('radios',$radios);
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

/*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE REVISTAS ----------- -------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
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
 
 /*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE TV---- ----------- -------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
*/ 		
   		
	   	public function ShowTV()
    	{
    		$tv= TV::where('status','=','En Proceso')->paginate(10);
    		return view('admin.TV')->with('TVS',$tv);
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

   		



 /*---------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------   FUNCIONES DE PROVEEDORES------ -------------------------------------
-----------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------
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
//-------------Mostrar Solicitudes  ---------------------------------
   		
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
       
        Mail::to($applys->email)->send(new PromoterAssing($applys));

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
  				
  				
  				Mail::to($applys->email)->send(new StatusApplys($applys,$request->message));

  				$applys->save();
  				return response()->json($applys);	
  			}
        else
        {   
            Mail::to($applys->email)->send(new StatusApplys($applys,$request->message));
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

      public function UpdateSalesman($id)
      {
        $salesman= Salesman::find($id);

        return response()->json($salesman);

      }

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
                    
                    ->editColumn('img_doc',function($user){

                      return '<img class="img-rounded img-responsive av" src="'.asset($user->img_doc).'"
                                 style="width:70px;height:70px;" alt="User Avatar" id="photo">';
                    })
                    ->editColumn('name',function($user){
                       return $user->name.' '.$user->last_name; 
                    })
                    ->rawColumns(['Estatus','img_doc'])
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
}
