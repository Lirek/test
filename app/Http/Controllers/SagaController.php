<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sagas;
use App\Rating;
use Laracasts\Flash\Flash;

class SagaController extends Controller
{
    public function index()
    {
        $sagas = Sagas::orderBy('id','DESC')->paginate('10');
        $sagas->each(function ($sagas){
            $sagas->rating;
        });
//        dd($saga);
        return view('seller.saga.index')->with('saga',$sagas);

    }

    public function create()
    {
        $rating = Rating::orderBy('id','ASC')->pluck('r_name','id');
        return view('seller.saga.create')
            ->with('ratin',$rating);
    }

    public function store(Request $request)
    {
        $file = $request->file('img_saga');
        $name = 'saga_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/sagas/';
        $file->move($path, $name);

        $saga = new Sagas($request->all());
        $saga->seller_id = \Auth::guard('web_seller')->user()->id;
        $saga->img_saga = $name;
        $saga->status = 2;
//        dd($saga,$saga->img_saga,$file);
        $saga->save();

        Flash::info('Se ha registrado ' . $saga->sag_name.'_' . ' de forma sastisfactoria')->important();

        return redirect()->route('sagas.index');
    }

    public function edit($id)
    {
        $sagas = Sagas::find($id);

        if (\Auth::guard('web_seller')->user()->id === $sagas->seller_id){

            $sagas->rating;
            $rating = Rating::orderBy('id','ASC')->pluck('r_name','id');

            return view('seller.saga.edit')
                ->with('saga',$sagas)
                ->with('ratin',$rating);
        }else{

            Flash::error(' No tienes los permisos necesarios para acceder ')->important();

            return redirect()->route('sagas.index');

        }
    }

    public function update(Request $request,$id)
    {
        $saga = Sagas::find($id);
        $saga->seller_id = \Auth::guard('web_seller')->user()->id;
        $saga->rating_id = $request->rating_id;
        $saga->sag_name = $request->sag_name;
        $saga->sag_description = $request->sag_description;
        if ($request->img_saga <> null) {
            $file = $request->file('img_saga');
            $name = 'saga_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/sagas/';
            $file->move($path, $name);
            $saga->img_saga = $name;
        }
        $saga->status = 2;
        $saga->type_saga = $request->type_saga;
//        dd($saga,$saga->img_saga);
        $saga->save();

        Flash::warning('Se ha modificado ' . $saga->sag_name . ' de forma exitosa')->important();

        return redirect()->route('sagas.index');

    }

    public function register(Request $request)
    {
        $file = $request->file('img_saga');
        $name = 'saga_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/sagas/';
        $file->move($path, $name);

        $saga = new Sagas($request->all());
        $saga->seller_id = \Auth::guard('web_seller')->user()->id;
        $saga->img_saga = $name;
        $saga->status = 2;
//        dd($saga,$saga->img_saga,$file);
        $saga->save();

        Flash::info('Se ha registrado ' . $saga->sag_name.'_' . ' de forma sastisfactoria')->important();

        return redirect()->route('tbook.create');
    }
}
