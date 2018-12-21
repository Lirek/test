<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tv;
use App\Seller;
use Laracasts\Flash\Flash;
use App\Http\Requests\TvRequest;
use Auth;
use File;
use App\TvTrace;

class TVController extends Controller
{
    public function index() {
        $tvs = Tv::where('seller_id',Auth::guard('web_seller')->user()->id)
                ->orderBy('id','DESC')
                ->paginate(8);
        return view('seller.tv.index')->with('tvs',$tvs);
    }

    public function create() {
        return view('seller.tv.create');
    }

    public function store(TvRequest $request) {
        $file = $request->file('logo');
        $name = 'tvlogo_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/Tv/';
        $file->move($path, $name);
        $tv = new Tv($request->all());
        $tv->seller_id = Auth::guard('web_seller')->user()->id;
        $tv->logo = '/images/Tv/'.$name;
        $tv->save();

        Flash::success('Se ha registrado '.$tv->name_r.' sastisfactoriamente')->important();
        return redirect()->action('TVController@index');
    }

    public function edit($id) {
        $tv = Tv::find($id);
        if ($tv!=null) {
            if (Auth::guard('web_seller')->user()->id === $tv->seller_id){
                return view('seller.tv.edit')->with('tv',$tv);
            } else {
                Flash::error(' No tienes los permisos necesarios para acceder ')->important();
                return redirect()->action('TVController@index');
            }
        } else {
            Flash::error('No se puede acceder a la ruta que está solicitando')->important();
            return redirect()->action('TVController@index');
        }
    }

    public function update(Request $request,$id) {
        $tv = Tv::find($id);
        //$tv->seller_id = Auth::guard('web_seller')->user()->id;
        $tv->name_r = $request->name_r;
        $tv->streaming = $request->streaming;
        $tv->email_c = $request->email_c;
        $tv->google = $request->google;
        $tv->instagram = $request->instagram;
        $tv->facebook = $request->facebook;
        $tv->twitter = $request->twitter;
        $tv->status = 2;
        if($request->file('logo') != null){
            File::delete(public_path().$tv->logo);
            $file = $request->file('logo');
            $name = 'tvlogo_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/Tv/';
            $file->move($path, $name);
            $tv->logo = '/images/Tv/'.$name;
        }
        $tv->save();

        Flash::success('Se ha modificado '.$tv->name_r.' de forma exitosa')->important();
        return redirect()->action('TVController@index');
    }

    public function show($id){
        $tv = Tv::find($id);
        $reproducciones = TvTrace::where('tv_id',$id)->get();
        if ($tv!=null) {
            return view('seller.tv.show')->with('tv',$tv)->with('reproducciones',$reproducciones);
        } else {
            Flash::error('No se puede acceder a la ruta que está solicitando')->important();
            return redirect()->action('TVController@index');
        }
    }

    public function destroy($id)
    {
        $tv = Tv::find($id);
//        dd($tv);
        if (\Auth::guard('web_seller')->user()->id === $tv->seller_id) {

            $tv->delete();

            Flash::error('Se a eliminado la canal con exito')->important();

            return redirect()->route('tvs.index');

        }else{

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('tvs.index');

        }
    }

}
