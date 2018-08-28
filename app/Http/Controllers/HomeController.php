<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\User;
use App\Megazines;
use App\Tags;
use App\Albums;
use App\Songs;
use App\Seller;
use App\Radio;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Transactions;
use App\Referals;
use App\Movie;
use App\TicketsPackage;
use App\Payments;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionApproved;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::find(Auth::user()->id);
        
        $TransacctionsSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->count(); 
        $TransacctionsAlbum= Transactions::where('user_id','=',Auth::user()->id)->where('album_id','<>',0)->count();
        $TransacctionsBook= Transactions::where('user_id','=',Auth::user()->id)->where('books_id','<>',0)->count();
        $TransacctionsMegazine= Transactions::where('user_id','=',Auth::user()->id)->where('megazines_id','<>',0)->count(); 
        $TransacctionsMovies= Transactions::where('user_id','=',Auth::user()->id)->where('movies_id','<>',0)->count();   
        $TransactionsRadio=Radio::where('status','=','Aprobado')->count();
        $TransactionsTv=Tv::where('status','=','Aprobado')->count();

        $Songs=Songs::where('album','=',0)->orderBy('updated_at','desc')->first();
        
        $Albums= Albums::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Movies=Movie::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Megazines=Megazines::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Book=Book::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Radio=Radio::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Tv=Tv::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();
        
        $Movies=Movie::where('status','=','Aprobado')->orderBy('updated_at','desc')->first();

        $Series=0;
        
        if ($Movies==NULL) { $Movies=False; }
        if ($Tv==NULL) { $Tv=False; }
        if ($Radio==NULL) { $Radio=False; }
        if ($Megazines==NULL) { $Megazines=False; }
        if ($Albums==NULL) { $Albums=False; }
        if ($Songs==NULL) { $Songs=False; }           

        if($user['status']=='admin')
        {
            return redirect('/admin');
        }

        $TransacctionsMusic=$TransacctionsSingle+$TransacctionsAlbum;
        $TransactionsLecture=$TransacctionsMegazine+$TransacctionsBook;
        return view('home')
                             ->with('TransactionsMusic',$TransacctionsMusic)
                             ->with('TransacctionsLecture',$TransactionsLecture)
                             ->with('TransactionsMovies',$TransacctionsMovies)
                             ->with('TransactionsRadio',$TransactionsRadio)
                             ->with('TransactionsTv',$TransactionsTv)
                             ->with('Songs',$Songs)
                             ->with('Albums',$Albums)
                             ->with('Movies',$Movies)
                             ->with('Megazines',$Megazines)
                             ->with('Book',$Book)
                             ->with('Radio',$Radio)
                             ->with('Tv',$Tv);

    }

    public function DataContentGraph()
    {
        $Songs=Songs::where('album','=',0)->get();
        
        $Albums= Albums::where('status','=','Aprobado')->get();
        
        $Music=$Songs->count()+$Albums->count();
        
        $Movies=Movie::where('status','=','Aprobado')->get()->count();
        
        $Megazines=Megazines::where('status','=','Aprobado')->get()->count();
        
        $Book=Book::where('status','=','Aprobado')->get()->count();
        
        $Radio=Radio::where('status','=','Aprobado')->get()->count();
        
        $Tv=Tv::where('status','=','Aprobado')->get()->count();
        
        $Movies=Movie::where('status','=','Aprobado')->get()->count();

        $Series=0;

        $Content=array(
                          $Music,
                          $Book,
                          $Megazines,
                          $Movies,
                          $Radio,
                          $Tv,
                          $Series, 
                         );

        return Response()->json($Content);
    }

    public function MyTickets($id)
    {
        $MyTickets=Auth::user()->credito;
        return Response()->json($MyTickets);
    }

    public function SaleTickets(){
        $package=TicketsPackage::all();
        return view('users.SalesTickets')->with('package',$package);
    }
    public function BuyPlan(Request $request){
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
        $Buy->reference=$request->references;
        $Buy->save();
        Flash('Pago registrado, en proceso de validación')->success();
        return redirect()->action('HomeController@index');

    }

    public function BuyPayphone($id,$cost,$value) {
        $Buy = new Payments;
        $Buy->user_id       = Auth::user()->id;
        $Buy->package_id    = $id;
        $Buy->cost          = $cost;
        $Buy->value         = $value;
        $Buy->status        = 2;
        $Buy->save();
        $Buy = Payments::all();
        $lastID = $Buy->last();
        return Response()->json($lastID);
    }

    public function TransactionCanceled($id,$reference) {
        $Buy = Payments::find($id);
        $Buy->status    = 3;
        $Buy->reference = $reference;
        $Buy->save();
        $respuesta = true;
        return Response()->json($respuesta);
    }

    public function TransactionApproved($id,$reference,$ticket) {
        $Buy = Payments::find($id);
        $Buy->status    = 1;
        $Buy->reference = $reference;
        $Buy->save();
        $this->creditos($ticket);
        $this->correo();
        $respuesta = true;
        return Response()->json($respuesta);
    }

    public function creditos($ticket) {
        $user = User::find(Auth::user()->id);
        $user->credito = $user->credito + $ticket;
        $user->save();
    }

    public function TransactionPending($id,$reference) {
        $Buy = Payments::find($id);
        $Buy->reference = $reference;
        $Buy->save();
        $respuesta = true;
        return Response()->json($respuesta);
    }

    public function correo() {
        $user = User::find(Auth::user()->id);
        Mail::to($user->email,$user->name." ".$user->last_name)->send(new TransactionApproved($user));
    }
}
