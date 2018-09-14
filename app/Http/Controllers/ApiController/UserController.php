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
          		"meta"=>'{ "status":"201","estatus":"Vacio"}',
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

    public function UpdateData(Request $request)
    {
       $user=User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->num_doc = $request->ci;
        $user->alias = $request->alias;
        
        if ($request->hasFile('img_perf'))
        {
         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'userpic'.$request->name.time().'.'.$request->file('img_perf')->getClientOriginalExtension();

         $request->file('img_perf')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_perf = $real_path='/user/'.$user->id.'/profile/'.$name;             
        }
        
        $user->fech_nac = $request->fech_nac;

       
        if ($request->hasFile('img_doc'))
        {


         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'document'.$request->name.time().'.'.$request->file('img_doc')->getClientOriginalExtension();

         $request->file('img_doc')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_doc = $real_path='/user/'.$user->id.'/profile/'.$name;             
        }
     
        $user->save();

        return Response::json(['status'=>'OK'], 200);
    }

    public function BuyPackage(Request $request)
    {
        $Buy = new Payments;
        $Buy->user_id=Auth::user()->id;
        $Buy->package_id=$request->ticket_id;
        $Buy->cost=$request->cost;
        $Buy->value=$request->Cantidad;

         if ($request->hasFile('voucher'))
        {


         $store_path = public_path().'/user/'.Auth::user()->id.'/ticketsDeposit/';
         
         $name = 'deposit'.$request->name.time().'.'.$request->file('voucher')->getClientOriginalExtension();

         $request->file('voucher')->move($store_path,$name);

         $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name;
         
         $Buy->voucher = $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name; 

        }
        $Buy->status=2;
        $Buy->save();
    }

}
