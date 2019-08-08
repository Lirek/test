<?php

namespace App\Http\Controllers\ApiController;

use App\Events\InviteEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\Resource;
use JWTAuth;
use App\User;
use App\Referals;
use Auth;
use Validator;
use File;


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
        //$x= $user->Referals()->get();
        $referals1 = [];
        $referals2= [];
        $referals3= [];
        //$WholeReferals = collect(new User);
        $WholeReferals = [];
        $total = 0;

        if ($user->Referals()->get()->isEmpty()) {
            return response()->json(['meta'=>['code'=>200],'data'=>$WholeReferals], 200);
        }
        foreach ($user->Referals()->get() as $key) {
            $referals1[]=$key->refered;
            $user = User::find($key->refered);
            $data[] = [
                'id' => $user->id,
                'nombre' => $user->name,
                'apellido' => $user->last_name,
                'correo' => $user->email,
                'telefono' => $user->phone,
                'img_perf' => $user->img_perf
            ];
            $total=$total+1;
            //$WholeReferals->prepend(User::find($key->refered));
        }

        if (count($referals1)>0) {
            foreach ($referals1 as $key2) {
                $joker = User::find($key2);
                foreach($joker->Referals()->get() as $key2) {
                    $referals2[]=$key2->refered;
                    /*
                    //$WholeReferals->prepend(User::find($key2->refered));
                    */
                    $total=$total+1;
                }
            }
        } else {
            $referals2 = 0;
        }

        if (count($referals2)>0) {
            foreach ($referals2 as $key3) {
                $joker = User::find($key3);
                foreach($joker->Referals()->get() as $key3) {
                    $referals3[]=$key3->refered;
                    /*
                    //$WholeReferals->prepend(User::find($key3->refered));
                    */
                    $total=$total+1;
                }
            }
        }
        
        $data = [
            'referals' => $data,
            'total_referals' => $total,
            'total_referals_first_generation' => count($referals1)
        ];
        /*
        $WholeReferals->map(function ($item) use($referals1,$referals2,$referals3){

            if (in_array($item->id, $referals1)) { return $item->level=1;}
            if (in_array($item->id, $referals2)) { return $item->level=2;}
            if (in_array($item->id, $referals3)) { return $item->level=3;}
        });
        return Datatables::of($WholeReferals)->toJson();
        //return Response::json(['status'=>'1','data'=>$WholeReferals], 200);
        */
        return response()->json(['meta'=>['code'=>200],'data'=>$data], 200);
    }

    public function verifyStatusUser() {
        if (auth()->user()->verify==1) {
            return response()->json(['meta'=>['code'=>200],'data'=>true], 200);
        } else {
            return response()->json(['meta'=>['code'=>200],'data'=>false], 200);
        }
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
            'imagen_de_perfil' => 'required'
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
            $image = $request->imagen_de_perfil;
            $image = explode(',',$image);
            if (count($image)==2) {
                $image = $image[1];
            } else {
                $image = $image[0];
            }
            $name = 'userpic'.$nombre.time().'.png';
            File::put($store_path.'/'.$name, base64_decode($image));
            $user->img_perf = '/user/'.$user->id.'/profile/'.$name;
            $user->save();

            return response()->json(['meta'=>['code'=>200],'data'=>'Imagen actualizada'],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }

        return response()->json(['meta'=>['code'=>200],'data'=>$request->imagen_de_perfil],200);
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

    public function invite() {
        $codido = auth()->user()->codigo_ref;
        $enlace = url('/').'/register/'.$codido;
        $data = [
            'codigo' => $codido,
            'enlace' => $enlace
        ];
        return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
    }

    public function inviteByEmail(Request $request) {
        $datos = $request->only(array_keys($request->all()));
        $rules = [
            'correo' => 'required|email'
        ];
        $validator = Validator::make($datos, $rules);
        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        try {
            $user = User::where('email',$request->correo)->get();
            if ($user->count()!=0) {
                return response()->json(['meta'=>['code'=>202],'data'=>false],200);
            } else {
                $url = url('/').'/register/'.auth()->user()->codigo_ref;
                event(new InviteEvent(auth()->user()->name,$request->correo,$url));
                return response()->json(['meta'=>['code'=>200],'data'=>true],200);
            }
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
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
