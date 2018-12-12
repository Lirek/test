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
use Illuminate\Support\Facades\Log;


use App\Events\PayementAprovalEvent;
use App\Events\PaymentDenialEvent;
use App\Events\AssingPointsEvents;

use JWTAuth;
use Response;

use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\Songs;
use App\Albums;
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
use App\Transactions;

use App\Transformers\UserTransformer;
use App\Transformers\AlbumsTransformer;
use App\Transformers\SongsTransformer;
use App\Transformers\MusicAuthorTransformer;
use App\Transformers\SellerTransformer;
use App\Transformers\TagsTransformer;
use App\Transformers\BooksTransformer;
use App\Transformers\MegazinesTransformer;
use App\Transformers\RadioTransformer;
use App\Transformers\TvTransformer;

use Auth;

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
        $user= User::find(auth()->user()->id);

        $x= $user->Referals()->get();
        $referals1 = [];
        $referals2= [];
        $referals3= [];
        $WholeReferals = collect(new User);

        if ($user->Referals()->get()->isEmpty())
        {
            return Response::json(['status'=>'Esta Vacio'], 204);

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
        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->num_doc = $request->ci;
        $user->type= $request->type;
        $user->alias = $request->alias;
        $user->fech_nac = $request->fech_nac;
        $user->direccion = $request->address;
        $user->phone = $request->phone;

        $user->save();

        $Json = Fractal::create()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->toArray();


        return Response::json($Json);
    }

    public function UploadDocument(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($request->hasFile('img_doc'))
        {


            $store_path = public_path().'/user/'.$user->id.'/profile/';

            $name = 'document'.$request->name.time().'.'.$request->file('img_doc')->getClientOriginalExtension();

            $request->file('img_doc')->move($store_path,$name);

            $real_path='/user/'.$user->id.'/profile/'.$name;

            $user->img_doc = $real_path='/user/'.$user->id.'/profile/'.$name;

            $user->save();

            $Json = Fractal::create()
                ->item($user)
                ->transformWith(new UserTransformer)
                ->toArray();


            return Response::json($Json);
        }
        else
        {

            return Response::json(['status'=>'Error'], 400);
        }
    }

    public function UploadAvatar(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($request->hasFile('img_perf'))
        {
            $store_path = public_path().'/user/'.$user->id.'/profile/';

            $name = 'userpic'.$request->name.time().'.'.$request->file('img_perf')->getClientOriginalExtension();

            $request->file('img_perf')->move($store_path,$name);

            $real_path='/user/'.$user->id.'/profile/'.$name;

            $user->img_perf = $real_path='/user/'.$user->id.'/profile/'.$name;

            $user->save();

            $Json = Fractal::create()
                ->item($user)
                ->transformWith(new UserTransformer)
                ->toArray();


            return Response::json($Json);
        }
        else
        {
            return Response::json(['status'=>'ERROR'], 402);
        }
    }

    public function BuyDepositPackage(Request $request)
    {
        $Buy = new Payments;
        $Buy->user_id=auth()->user()->id;
        $Buy->package_id=$request->ticket_id;
        $Buy->cost=$request->cost;
        $Buy->value=$request->Cantidad;
        $Buy->method='Deposito';
        $Buy->status=2;
        $Buy->reference=$request->references;
        $Buy->save();

        return Response::json(['status'=>'OK'], 201);
    }

    public function UploadVoucher($id,Request $request)
    {
        $Buy = Payments::find($id);

        if ($request->hasFile('voucher'))
        {


            $store_path = public_path().'/user/'.Auth::user()->id.'/ticketsDeposit/';

            $name = 'deposit'.$request->name.time().'.'.$request->file('voucher')->getClientOriginalExtension();

            $request->file('voucher')->move($store_path,$name);

            $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name;

            $Buy->voucher = $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name;

            $Buy->save();

            return Response::json(['status'=>'OK'], 201);
        }

        return Response::json(['status'=>'Error de Archivo'], 204);
    }

    public function BuyPayphonePackage(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $Condition=Carbon::now()->firstOfMonth()->toDateString();

        $revenueMonth = Payments::where('user_id','=',$user->id)
            ->where('created_at', '>=',$Condition)
            ->where('status', '=','Aprobado')
            ->get();

        $balance=  SistemBalance::find(1);

        $balance->tickets_solds = $balance->tickets_solds + $deposit->Tickets->amount;

        $balance->save();

        if ($revenueMonth->count()<=1)
        {
            event(new AssingPointsEvents($user->id,$Buy->package_id));
        }

        event(new PayementAprovalEvent($user->email));

        return Response::json(['status'=>'OK'], 201);
    }

    public function BuyPointsPackage(Request $request)
    {

        $user = User::find(auth()->user()->id);
        $TicketsPackage= TicketsPackage::find($request->ticket_id);

        if ($request->cost > $user->points)
        {
            return Response::json(['status'=>'Puntos insuficientes'], 201);;
        }

        else
        {
            $Buy = new Payments;
            $Buy->user_id       = Auth::user()->id;
            $Buy->package_id    =$request->ticket_id;
            $Buy->cost          =$request->points;
            $Buy->value         =$request->Cantidad;
            $Buy->status        = 1;
            $Buy->method        ='Puntos';
            $Buy->save();


            $ticket=$TicketsPackage->amount*$request->Cantidad;
            $cost=$request->Cantidad*$request->points;

            $user->credito = $ticket;
            $user->point = $user->points - $cost;
            $user->save();

            $Condition=Carbon::now()->firstOfMonth()->toDateString();

            $revenueMonth = Payments::where('user_id','=',$user->id)
                ->where('created_at', '>=',$Condition)
                ->where('status', '=','Aprobado')
                ->get();

            $balance=  SistemBalance::find(1);

            $balance->tickets_solds = $balance->tickets_solds + $deposit->Tickets->amount;

            $balance->save();

            if ($revenueMonth->count()<=1)
            {
                event(new AssingPointsEvents($user->id,$Buy->package_id));
            }

            event(new PayementAprovalEvent($user->email));
        }
        return Response::json(['status'=>'OK'], 201);
    }

    public function MyContent()
    {
        $Transaction=Transactions::where('user_id','='auth()->user()->id);

        if($Transaction->isEmpty())
        {
            return Response::json(['status'=>'No posee Contenidos Comprados'], 200);       
        }
        else
        {
            $MyContent= collect();

            foreach ($Transactions as $Transaction) 
            {
                if($Transaction->books_id != 0)
                {
                    $BookContent=Book::find($Transaction->books_id);

                    $MyContent->add(['name'=>$BookContent->title,
                                     'type'=>'Libro',
                                     'img'=>$BookContent->cover,
                                     'acces'=>'Books/'.$BookContent->id]);                
                }
                elseif($Transaction->album_id != 0)
                {
                    $AlbumContent=Albums::find($Transaction->album_id);                    
                    

                    $MyContent->add(['name'=>$AlbumContent->name_alb,
                                     'type'=>'Album',
                                     'img'=>$AlbumContent->cover,
                                     'id'=>$BookContent->id]);
                }
                elseif($Transaction->song_id != 0)
                {
                    $SingleContent=Songs::find($Transaction->song_id);

                    $MyContent->add(['name'=>$SingleContent->song_name,
                                     'type'=>'Single',
                                     'img'=>$SingleContent->autors->photo,
                                     'id'=>$SingleContent->id]);
                }
                elseif($Transaction->series_id != 0)
                {
                    $SeriesContent=Serie::find($Transaction->series_id);

                    $MyContent->add(['name'=>$SeriesContent->title,
                                     'type'=>'Serie',
                                     'img'=>$SeriesContent->img_poster,
                                     'id'=>$SeriesContent->id]);
                }
                elseif($Transaction->episodes_id != 0)
                {
                    $EpisodeContent=Episode::find($Transaction->episodes_id);

                    $MyContent->add(['name'=>$EpisodeContent->episode_name,
                                     'type'=>'Episodio',
                                     'img'=>$EpisodeContent->Serie->img_poster,
                                     'id'=>$EpisodeContent->id]);                 
                }
                elseif($Transaction->movies_id != 0)
                {
                    $MovieContent=Movie::find($Transaction->movies_id);

                    $MyContent->add(['name'=>$MovieContent->title,
                                     'type'=>'Episodio',
                                     'img'=>$MovieContent->img_poster,
                                     'id'=>$MovieContent->id]);
                    
                }
                elseif($Transaction->megazines_id != 0)
                {
                    $MegazineContent=Megazines::find($Transaction->megazines_id);
                    
                    $MyContent->add(['name'=>$MegazineContent->title,
                                     'type'=>'Revista',
                                     'img'=>$MegazineContent->img_poster,
                                     'id'=>$MegazineContent->id]);                    
                }
            }

            return Response::json($MyContent);       
        }
    }
    
}
