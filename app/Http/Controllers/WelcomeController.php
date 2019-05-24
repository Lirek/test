<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;
use App\ApplysSellers;
use App\Book;
use App\Megazines;
use App\Radio;
use App\Tv;
use App\Movie;
use App\Serie;
use App\Albums;
use App\Songs;
use App\Sagas;
use App\User;
use Auth;
use App\BidderRoles;

class WelcomeController extends Controller
{

        public function terminosYcondiciones()
    {
        return view('terminosCondiciones');
    }

    public function leipel()
    {
        return view('queEsLeipel');
    }

    public function welcome() {
        //$sellers = Seller::orderBy('id', 'DESC')->paginate('10');
        $sellers = Seller::all();
        // LECTURA
        $lectura = [];
        $books = Book::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($books as $b) {
            $lectura[] = array(
                'type' => 'Libro',
                'cover' => "/images/bookcover/".$b->cover,
                'name' => $b->title
            );
        }
        $megazines = Megazines::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($megazines as $m) {
            $lectura[] = array(
                'type' => 'Revista',
                'cover' => $m->cover,
                'name' => $m->title
            );
        }
        // RADIO
        //$radios = Radio::all();
        $radios = [];
        $radio = Radio::where('status','Aprobado')->orderBy('id','DESC')->take(20)->get();
        foreach ($radio as $r) {
            $radios[] = array(
                'type' => 'Radio',
                'logo' => $r->logo,
                'name' => $r->name_r
            );
        }
        // TV
        //$tvs = Tv::all();
        $tvs = [];
        $tv = Tv::where('status','Aprobado')->orderBy('id','DESC')->take(20)->get();
        foreach ($tv as $t) {
            $tvs[] = array(
                'type' => 'TV',
                'logo' => $t->logo,
                'name' => $t->name_r
            );
        }
        // CINE
        $cine = [];
        $movies = Movie::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($movies as $m) {
            $cine[] = array(
                'type' => 'Pelicula',
                'img_poster' => $m->img_poster,
                'name' => $m->title
            );
        }
        $series = Serie::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($series as $s) {
            $cine[] = array(
                'type' => 'Serie',
                'img_poster' => $s->img_poster,
                'name' => $s->title
            );
        }
        // MUSICA
        $musica = [];
        $album = Albums::where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($album as $a) {
            $musica[] = array(
                'type' => 'Álbum',
                'cover' => $a->cover,
                'name' => $a->name_alb
            );
        }
        $single = Songs::where('album',0)->where('status','Aprobado')->orderBy('id','DESC')->take(10)->get();
        foreach ($single as $s) {
            $musica[] = array(
                'type' => 'Canción',
                'cover' => '/plugins/img/DefaultMusic.png',
                'name' => $s->song_name
            );
        }

        $iRadios = 0;
        $iTvs = 0;
        $iCines = 0;
        $iMusicas = 0;
        $iLecturas = 0;

        if (Auth::check())
        {
            if (Auth::guard()->user()->account_status=='closed')
            {
                Auth::logout();
            }
        }

        $modules = BidderRoles::all();

        return view('welcome')
            ->with('iRadios',$iRadios)
            ->with('iTvs',$iTvs)
            ->with('iCines',$iCines)
            ->with('iMusicas',$iMusicas)
            ->with('iLecturas',$iLecturas)
            ->with('seller', $sellers)
            ->with('book',$lectura)
            ->with('tv',$tvs)
            ->with('radio',$radios)
            ->with('movie',$cine)
            ->with('music',$musica)
            ->with('modules',$modules);
    }

    public function email(Request $request){
        $email=User::where('email','=',$request->email)->first();


        if($email){
             return response()->json(false);
        }else{
            return response()->json(true);
        }

    }

    public function emailSeller(Request $request){
        $email=Seller::where('email','=',$request->email)->first();


        if($email){
            return response()->json($email->email);
        }else{
            return response()->json(1);
        }


    }

    //Validación de correo siendo verificado
    /*public function applyEmailSeller(Request $request){
        $apply_email=ApplysSellers::where('email','=',$request->email)->first();


        if($apply_email){
            return response()->json($apply_email->$apply_email);
        }else{
            return response()->json(1);
        }

    }*/

    public function indexRadio() {
        //$radios = Radio::where('status','Aprobado')->take(5)->get();
        $radios = Radio::where('status','Aprobado')->orderBy('id','DESC')->take(5)->get();
        return response()->json($radios);
    }
    public function indexTv() {
        //$tvs = Tv::where('status','Aprobado')->take(5)->get();
        $tvs = Tv::where('status','Aprobado')->orderBy('id','DESC')->take(5)->get();
        return response()->json($tvs);
    }
}
