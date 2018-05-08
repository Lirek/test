<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tv;
use App\Seller;
use Laracasts\Flash\Flash;
use App\Http\Requests\TvRequest;

class TVController extends Controller
{
    public function index()
    {
        $tvs = Tv::orderBy('id','DESC')->paginate(8);

        return view('seller.tv.index')->with('tvs',$tvs);
    }

    public function create()
    {
        return view('seller.tv.create');
    }

    public function store(TvRequest $request)
    {
        $file = $request->file('logo');
        $name = 'tvlogo_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/tv/';
        $file->move($path, $name);
        $tv = new Tv($request->all());
        $tv->seller_id = \Auth::guard('web_seller')->user()->id;
        $tv->logo = $name;
        $tv->save();

        Flash::info('Se ha registrado ' . $tv->name_r . ' de forma sastisfactoria')->important();

        return redirect()->route('tvs.index');
    }

    public function edit($id)
    {
        $tv = Tv::find($id);

        if (\Auth::guard('web_seller')->user()->id === $tv->seller_id){

            return view('seller.tv.edit')->with('tv',$tv);

        }else{

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('tvs.index');

        }

    }

    public function update(Request $request,$id)
    {
        $tv = Tv::find($id);
        $tv->seller_id = \Auth::guard('web_seller')->user()->id;
        $tv->name_r = $request->name_r;
        $tv->streaming = $request->streaming;
        if($request->logo <> null){
            $file = $request->file('logo');
            $name = 'tvlogo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/tv/';
            $file->move($path, $name);
            $tv->logo = $name;
        }
        $tv->email;
        $tv->google = $request->google;
        $tv->instagram = $request->instagram;
        $tv->facebook = $request->facebook;
        $tv->twitter = $request->twitter;
        $tv->save();

        Flash::warning('Se ha modificado '. $tv->name_r . ' de forma exitosa')->important();;

        return redirect()->route('tvs.index');

    }

    public function show($id)
    {
        $tv = Tv::find($id);

        return view('seller.tv.show')->with('tv',$tv);
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
