<?php

namespace App\Http\Controllers;

use App\Radio;
use App\Seller;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\RadioRequest;

class RadiosController extends Controller
{
    public function index()
    {
        $radios = Radio::orderBy('id','DESC')->paginate('8');
        return view('seller.radio.index')->with('radio',$radios);
    }

    public function create()
    {
        return view('seller.radio.create');
    }

    public function store(RadioRequest $request)
    {
//        if($request->file('logo'))
//        {
            $file = $request->file('logo');
            $name = 'radiologo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/radio/';
            $file->move($path, $name);
//        }
        $radio = new Radio($request->all());
        $radio->seller_id = \Auth::guard('web_seller')->user()->id;
        $radio->logo = $name;
//        dd($radio);
        $radio->save();

        Flash::info('Se ha registrado '. $radio->name_r .' de forma sastisfactoria')->important();

        return redirect()->route('radios.index');

    }

    public function edit($id)
    {
        $radio = Radio::find($id);

        if (\Auth::guard('web_seller')->user()->id === $radio->seller_id) {

            return view('seller.radio.edit')->with('radio', $radio);

        }else {

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('radios.index');

        }
    }

    public function update(Request $request,$id)
    {
        $radio = Radio::find($id);
        $radio->seller_id = \Auth::guard('web_seller')->user()->id;
        $radio->name_r = $request->name_r;
        $radio->streaming = $request->streaming;
        if($request->logo <> null){
            $file = $request->file('logo');
            $name = 'radiologo_' . time() . '.'. $file->getClientOriginalExtension();
            $path = public_path(). '/images/radio/';
            $file->move($path, $name);
            $radio->logo = $name;
        }
        $radio->email;
        $radio->google = $request->google;
        $radio->instagram = $request->instagram;
        $radio->facebook = $request->facebook;
        $radio->twitter = $request->twitter;
        $radio->save();

        Flash::warning('Se ha modificado '. $radio->name_r . ' de forma exitosa')->important();

        return redirect()->route('radios.index');

    }

    public function show($id)
    {
        $radio = Radio::find($id);

        return view('seller.radio.show')->with('radio',$radio);
    }

    public function destroy($id)
    {
        $radio = Radio::find($id);
        //dd($radio);

        if (\Auth::guard('web_seller')->user()->id === $radio->seller_id) {

            $radio->delete();

            Flash::error('Se a eliminado la canal de radio con exito')->important();

            return redirect()->route('radios.index');

        }else{

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('radios.index');

        }

    }
}
/**
 * Streaminf-> http://listen.shoutcast.com/rcr750canal2
 *
 * Email-> rcr@hotmail.com
 *
 * Instagram-> https://instagram.com/RCR750
 *
 * Facebook-> https://www.facebook.com/RCR750
 *
 * Twitter-> https://twitter.com/RCR750
 *
 */