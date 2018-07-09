<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Events\InviteEvent;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        
        $user->email = $request->email;
        
        $user->name = $request->name;
        
        $user->password = bcrypt($request->password);
                 
                 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
        
                   for ($i = 0; $i < 6; $i++) 
                      {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                      }


            $code=$randomString;

        $user->codigo_ref = $code;
       
        $user->credito=0;

        $user->save();

        $referal_user = User::where('codigo_ref','=',$request->user_code)->first();
      
        $refered = new Referals;

        $refered->user_id = $referal_user->id;

        $refered->refered = $user->id;

        $refered->my_code = $request->user_code;

        $refered->save();

        Auth::login($user);

        return redirect()->action('HomeController@index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::where('codigo_ref','=',$id)->get();

        return view('users.register')->with('user_code',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($user);
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->ci = $request->ci;
        $user->num_doc = $request->num_doc;
        $user->img_doc = $request->img_doc;
        $user->alias = $request->alias;
        
        if ($request->hasFile('img_perf'))
        {


         $store_path = public_path().'/user/'.$user->id.'/profile/';
         
         $name = 'userpic'.$request->name.time().'.'.$request->file('img_perf')->getClientOriginalExtension();

         $request->file('img_perf')->move($store_path,$name);

         $real_path='/user/'.$user->id.'/profile/'.$name;
         
         $user->img_perf = $real_path='/user/'.$user->id.'/profile/'.$name;             
        }
        else
        {
            $user->img_perf= NULL;
        }
        
        $user->fech_nac = $request->fech_nac;
     
        //dd($user);
        $user->save();
        Flash('Se Han Modificado Sus Datos Con Exito')->success();
        
        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//---------------------Iniicio de Compra, Muestra de Musica------------------
    

    //Funcion que recive el single a comprar y lo registra en la tabla Transacciones
    public function BuySingle($id,Request $request)
    {
        $Single= Songs::find($id);
        
        $user = User::find(Auth::user()->id);

        if ($Single->cost > $user->credito) 
        {
            return response()->json(0);    
        }
        
        $check = Transactions::where('song_id','=',$Single->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->song_id=$Single->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $Single->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$Single->cost;
            $user->save(); 

            return response()->json($Transaction);
        }
    
    }

    //funcion que se encarga de buscar el contenido musical del usuario 
    public function MyMusic()
    {
        $TransactionSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->get();
        
        $TransactionAlbum= Transactions::where('user_id','=',Auth::user()->id)->where('album_id','<>',0)->get(); 


        if($TransactionSingle->count() > 0)
            {
            
                foreach ($TransactionSingle as $key) 
                    {
                        $Single[] = $key->Songs;    
                    }
            }
            else
             {
                $Single = 0;
                
             }

        if($TransactionAlbum->count() > 0)
            {
            
                foreach ($TransactionAlbum as $key) 
                    {
                        $Albums[] = $key->Songs;    
                    }
            }
            else
             {
                $Albums = 0;
             }


        
        return view('users.MyMusic')->with('Singles',$Single)->with('Albums',$Albums);
        
    }

    public function AddElementPlaylist($song_id)
    {
        $Songs= Songs::find($song_id);
        
        $file= $Songs->song_file;
        
        if($Songs->album==0 or $Songs->album==NULL)
        {
            $img= $Songs->autors->photo;
        }
        else
        {
            $img=$Songs->album->cover;    
        }
        
        $title=$Songs->song_name;
        $artist=$Songs->autors->name;

        $insert='{"title":'.$title.',"artist:":'.$artist.',"img":'.$img.', "file":'.$file.'}';

        $Playlist= Storage::putFileAs('Playlist', new File('/user/'.Auth::id().'Playlist'), 'public');


        return response()->json($Playlist);

    }
//-------------------------------------------------------------------------

    public function BuyBook(Request $request,$id)
    {
        $book= Book::find($id);
        $user = User::find(Auth::user()->id);

        if ($book->cost > $user->credito) 
        {
            return response()->json(0);    
        }

        $check = Transactions::where('books_id','=',$book->id)->where('user_id','=',$user->id)->get();
        $check->isEmpty();

        if(count($check)>=1)
        {
            return response()->json(1);   
        }
        else
        {
            $Transaction= new Transactions;
            $Transaction->books_id=$book->id;
            $Transaction->user_id=$user->id;
            $Transaction->tickets= $book->cost*-1;
            $Transaction->save();

            $user->credito= $user->credito-$book->cost;
            $user->save(); 

            return response()->json($Transaction);
        }

    }

    public function ShowMyReadings()
    {

        $MyBooks= Transactions::where('user_id','=',Auth::user()->id)->where('books_id','<>',0)->get();

        $MyMegazines= Transactions::where('user_id','=',Auth::user()->id)->where('megazines_id','<>',0)->get();

        if ($MyBooks->count() == 0) 
        {
            $Books=0;
        }
        else
        {
            foreach ($MyBooks as $key) 
            {
                $Books[]= Book::find($key->books_id);
            }
        }

        if ($MyMegazines->count() == 0) 
        {
            $Megazine= 0;
        }
        else
        {
            foreach ($MyMegazines as $key) 
            {
                $Megazine[]= Megazines::find($key->megazines_id);        
            }
        }

        

        return view('users.MyReadings')->with('Megazines', $Megazine)->with('Books',$Books);
    }

    public function SendRead($id)
    {
        $Book=Book::find($id);
        $Megazine= Megazines::find($id);

        if ($Book->count() == 0) 
        {
            return view('users.MyLecture')->with('pdf',$Megazine->megazine_file);
        }
        else
        {
            return view('users.MyLecture')->with('pdf','/book/'.$Book->books_file);
        }

    }


//----------------------------Invitar Personas------------------------------

    public function Invite(Request $request)
    {
        
        $url= url('/').'/register/'.Auth::user()->codigo_ref;
        event(new InviteEvent(Auth::user()->name,$request->email,$url));
        Flash('Se Ha Invitado con Exito')->success();
        return redirect()->action('HomeController@index');

    }


//--------------------------------------------------------------------------
}
