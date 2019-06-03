<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\User;
use App\Referals;
use Auth;
use Validator;
use File;
/*No se usasn*/
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Log;
use App\Events\PayementAprovalEvent;
use App\Events\PaymentDenialEvent;
use App\Events\AssingPointsEvents;
use Response;
use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\Songs;
use App\Albums;
use App\Radio;
use App\Seller;
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
use Carbon\Carbon;
use App\Mail\TransactionApproved;
use Illuminate\Support\Facades\Mail;
use QrCode;
/*No se usasn*/

class UserController extends Controller
{
    public function UserData() {
        try {
            $user = auth()->user();
            $data = [
                'id' => $user->id,
                'nombre' => $user->name,
                'apellido' => $user->last_name,
                'correo' => $user->email,
                'fech_nac' => $user->fech_nac,
                'tipo_doc' => $user->type_doc,
                'num_doc' => $user->num_doc,
                'img_doc' => $user->img_doc,
                'genero' => $user->type,
                'alias' => $user->alias,
                'telefono' => $user->phone,
                'direccion' => $user->direccion,
                'img_perf' => $user->img_perf,
                'tickets' => $user->credito,
                'puntos' => $user->points,
                'puntos_pendientes' => $user->pending_points,
                'verificado' => $user->verify
            ];
            return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }

    public function WebsUser() {
        $user= User::find(auth()->user()->id);
        $x= $user->Referals()->get();
        $referals1 = [];
        $referals2= [];
        $referals3= [];
        $WholeReferals = collect(new User);

        if ($user->Referals()->get()->isEmpty()) {
            return Response::json(['status'=>'1','message'=>'No tiene referidos','data'=>[]], 200);
        }
        foreach ($user->Referals()->get() as $key) {
            $referals1[]=$key->refered;
            $WholeReferals->prepend(User::find($key->refered));
        }

        if (count($referals1)>0) {

            foreach ($referals1 as $key2) {
                $joker = User::find($key2);
                foreach($joker->Referals()->get() as $key2) {
                    $referals2[]=$key2->refered;
                    $WholeReferals->prepend(User::find($key2->refered));
                }
            }
        } else {
            $referals2=0;
        }

        if (count($referals2)>0) {
            foreach ($referals2 as $key3) {
                $joker = User::find($key3);
                foreach($joker->Referals()->get() as $key3) {
                    $referals3[]=$key3->refered;
                    $WholeReferals->prepend(User::find($key3->refered));
                }
            }
        } else {
            $referals3=0;
        }



        $WholeReferals->map(function ($item) use($referals1,$referals2,$referals3){

            if (in_array($item->id, $referals1)) { return $item->level=1;}
            if (in_array($item->id, $referals2)) { return $item->level=2;}
            if (in_array($item->id, $referals3)) { return $item->level=3;}
        });
        //return Datatables::of($WholeReferals)->toJson();
        return Response::json(['status'=>'1','data'=>$WholeReferals], 200);
    }

    public function UpdateData(Request $request) {
        $datos = $request->only(array_keys($request->all()));

        $rules = [
            'nombre' => 'required|max:191',
            'apellido' => 'required|max:191',
            'type_doc' => 'required|max:191',
            'num_doc' => 'required|max:191',
            'type' => 'required|max:1',
            'alias' => 'required|max:191',
            'fech_nac' => 'required|date',
            'direccion' => 'required|max:191',
            'telefono' => 'required|max:191'
        ];

        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }

        try {
            $user = User::find(auth()->user()->id);
            $user->name = $request->nombre;
            $user->last_name = $request->apellido;
            $user->type_doc = $request->type_doc;
            $user->num_doc = $request->num_doc;
            if ($request->type != null){
                $user->type = $request->type;
            }
            $user->alias = $request->alias;
            $user->fech_nac = $request->fech_nac;
            $user->direccion = $request->direccion;
            $user->phone = $request->telefono;
            if ($user->verify==2) {
                $user->verify = 0;
            }
            $user->save();

            $data = [
                'nombre' => $user->name,
                'apellido' => $user->last_name,
                'type_doc' => $user->type_doc,
                'num_doc' => $user->num_doc,
                'genere' => $user->type,
                'alias' => $user->alias,
                'fech_nac' => $user->fech_nac,
                'direccion' => $user->direccion,
                'telefono' => $user->phone,
                'verify' => $user->verify
            ];
            return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }

    public function UploadDocument(Request $request) {

        $datos = $request->only(array_keys($request->all()));
        $rules = [
            //'imagen_del_documento' => 'required|image|dimensions:max_width=500,max_height=500|size:1024'
            'imagen_del_documento' => 'required|image'
        ];
        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }

        try {
            $user = User::find(auth()->user()->id);
            if ($user->img_doc!=null) {
                File::delete(public_path().$user->img_doc);
            }
            $nombre = $this->sinAcento($user->name);
            $store_path = public_path().'/user/'.$user->id.'/profile/';
            $name = 'document'.$nombre.time().'.'.$request->file('imagen_del_documento')->getClientOriginalExtension();
            $request->file('imagen_del_documento')->move($store_path,$name);
            $user->img_doc = '/user/'.$user->id.'/profile/'.$name;
            $user->save();
            $data = [
                'img_doc' => $user->img_doc
            ];
            return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }

    public function UploadAvatar(Request $request) {

        $datos = $request->only(array_keys($request->all()));
        $rules = [
            //'img_perf' => 'required|image|dimensions:max_width=500,max_height=500|size:1024'
            'imagen_de_perfil' => 'required|image'
        ];
        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        try {
            $user = User::find(auth()->user()->id);
            if ($user->img_perf!=null) {
                File::delete(public_path().$user->img_perf);
            }
            $nombre = $this->sinAcento($user->name);
            $store_path = public_path().'/user/'.$user->id.'/profile/';
            $name = 'userpic'.$nombre.time().'.'.$request->file('imagen_de_perfil')->getClientOriginalExtension();
            $request->file('imagen_de_perfil')->move($store_path,$name);
            $user->img_perf = '/user/'.$user->id.'/profile/'.$name;
            $user->save();
            $data = [
                'img_perf' => $user->img_perf
            ];
            return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }
    
    public function valSponsor() {
        $referals = Referals::where('refered',auth()->user()->id)->get();
        if ($referals->count()!=0) {
            return response()->json(['meta'=>['code'=>400],'data'=>true],200); // tiene patrocinador
        } else {
            $fechaRegistro = explode(" ", auth()->user()->created_at);
            $diasRegistro = date_diff(date_create($fechaRegistro[0]),date_create(date("Y-m-d")));
            return response()->json(['meta'=>['code'=>200],'data'=>$diasRegistro->days],200); // dias sin patrocinador
        }
    }

    public function whoSponsor($code) {
        $validarPatrocinador = $this->validarPatrocinador($code);
        $miCod = auth()->user()->codigo_ref;
        if ($miCod==$code) { // ERROR: mi mismo codigo
            return response()->json(['meta'=>['code'=>400],'data'=>1],200);
        } else {
            if ($validarPatrocinador==2) { // ERROR: codigo de alguien de mi red
                return response()->json(['meta'=>['code'=>400],'data'=>$validarPatrocinador],200); 
            } else {
                $sponsor = User::where('codigo_ref',$code)->first();
                if ($sponsor) {
                    $datos = [
                        'id' => $sponsor->id,
                        'nombre' => $sponsor->name,
                        'apellido' => $sponsor->last_name,
                        'img_perf' => $sponsor->img_perf
                    ];
                    return response()->json(['meta'=>['code'=>200],'data'=>$datos],200);
                } else { // ERROR: codigo no existe
                    return response()->json(['meta'=>['code'=>400],'data'=>0],200); 
                }
            }
        }
    }

    public function validarPatrocinador($codigo) {
        $ids = NULL;
        $cods = NULL;
        $user = User::find(auth()->user()->id);
        $datos1 = $user->referals()->get();
        if ($datos1->count()>0) {
            foreach ($datos1 as $info) {
                $ids[] = $info->refered;
            }
        }
        if ($ids!=NULL) {
            for ($i=0; $i < count($ids); $i++) { 
                $user = User::find($ids[$i]);
                $datos = $user->referals()->get();
                if ($datos->count()>0) {
                    foreach ($datos as $info) {
                        $ids[] = $info->refered;
                    }
                }
            }
            $info = User::select('codigo_ref')->whereIn("id",$ids)->get();
            foreach ($info as $key) {
                $cods[] = $key->codigo_ref;
            }
        }
        if ($cods===NULL) { // Se agrega sin problema porque esa persona no tiene red
            $agregar = 3;
        } else { // si tiene red hay que revisar que el codigo no pertenezca a alguien de dicha red
            $busqueda = in_array($codigo, $cods);
            if ($busqueda===true) { // el codigo ya lo tiene alguien de su red
                $agregar = 2;
            } else { // puede agregar ese codigo sin problema
                $agregar = 3;
            }
        }
        return $agregar;
    }

    public function addSponsor(Request $request) {
        $datos = $request->only(array_keys($request->all()));

        $rules = [
            'codigo' => 'required|max:191'
        ];
        $validator = Validator::make($datos, $rules);
        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        $user = User::where('codigo_ref',$request->codigo)->where('id','<>',auth()->user()->id)->first();

        if ($user) {
            try {
                $referals = new Referals;
                $referals->user_id = $user->id;
                $referals->refered = auth()->user()->id;
                $referals->my_code = $request->codigo;
                $referals->save();
                return response()->json(['meta'=>['code'=>201],'data'=>true],200);
            } catch (Exception $e) {
                return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
            }
        } else {
            return response()->json(['meta'=>['code'=>400],'data'=>false],200); // algun error con el codigo
        }
    }

    public function sinAcento($cadena) {
        $originales =  'ÀÁÂÃÄÅÆàáâãäåæÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöðøÙÚÛÜùúûÇçÐýýÝßÞþÿŔŕÑñ';
        $modificadas = 'AAAAAAAaaaaaaaEEEEeeeeIIIIiiiiOOOOOOoooooooUUUUuuuCcDyyYBbbyRrÑñ';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return $cadena;
    }
}
