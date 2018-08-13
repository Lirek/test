<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Yajra\Datatables\Datatables;
use Tymon\JWTAuth\Exceptions\JWTException;

use JWTAuth;
use Response;

use App\User;
use App\Transformers\UserTransformer;


class UserController extends Controller
{
    public function UserData()
    {
    	$user=auth()->user();

    				$Json = Fractal::create()
                           ->item($user)
                           ->transformWith(new UserTransformer)                
                           ->toArray();          

        return Response::json($Json);
    }

   
    public function WebsUser()
    {
    	$user= auth()->user();
          $x=$user->Referals()->get();
          $referals1 = [];
          $referals2= [];
          $referals3= [];
          $WholeReferals = new Collection; 
          
          if ($user->Referals()->get()->isEmpty()) 
          {            
          	$Json=[
          		"meta"=>'{ "status":"401","error":"Vacio"}',
    			"data"=>'{}'
    			];

    		return Response::json($Json);
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
}
