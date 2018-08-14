<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusApplys;
use App\Mail\PromoterAssing;


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
use App\Tv;
use App\music_authors;
use App\SellersRoles;
use App\Promoters;
use App\LoginControl;
//-----------------------------------------------------

class PromoterController extends Controller
{
    public function index()
    {
    	$promoter = Auth::guard('Promoter')->user()->id;

    	$aplyss = ApplysSellers::where('status','=','En Proceso')->count();
    	
    	$sellers = Seller::where('estatus','=','En Proceso')->count();

    	$user = Seller::all();  

    	$content_total=0;

      $TicketsPackage = TicketsPackage::all();

    	foreach ($user as $key1) 
    	{

    		if ($key1->has('sagas')) 
    		{

    			$content_total=$content_total+$key1->sagas()->where('status','=','En Revision')->count();
    		}


    		if ($key1->has('MusicAuthors')) 
    		{
    			$content_total=$content_total+$key1->MusicAuthors()->where('status','=','En Proceso')->count();		
    		}

    		
    		if ($key1->has('BooksAuthors')) 
    		{
    			$content_total=$content_total+$key1->BooksAuthors()->where('status','=','En Revision')->count();		
    		}

    		
    		if ($key1->has('Tags'))
    		{
    			$content_total=$content_total+$key1->Tags()->where('status','=','En Proceso')->count();		
    		}
    		

    		if ($key1->roles->has('roles') != FALSE)
    		{
    			foreach ($content->roles() as $modules) 
    			{
    				   switch ($role->name) 
            			{
                
                			case 'Musica':
                    		
                    			$Musica = $key1->albums()->where('status','=','En Revision')->count();
                    		
                    			$songs=0;
                    			
                    			foreach ($key1->songs()->where('status','=','En Revision')->get() as $key) 
                    			{
                        			if ($key->album =! NULL or $key->album =! 0) 
                        			{
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
                
                			default:
                    		# code...
                    		break;
            			};
    			}
    		}
    	}
		


    	return view('promoter.home')->with('sellers',$sellers)->with('aplyss',$aplyss)->with('content_total',$content_total)->with('TicketsPackage',$TicketsPackage);
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
