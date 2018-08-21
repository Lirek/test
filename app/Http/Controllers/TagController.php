<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use Laracasts\Flash\Flash;
use Yajra\Datatables\Datatables;
class TagController extends Controller
{
    public function store(Request $request) {

        //dd($request->all());
    	
    	$tag = new Tags;
    	$tag->tags_name 	= ucwords($request->tags_name);
    	$tag->type_tags 	= $request->type_tags;
    	$tag->seller_id 	= $request->seller_id;
    	$tag->save();

    	Flash::success('Se ha registrado '.$tag->tags_name.' de manera exitosa, debe esperar su activación para poder utilizarlo')->important();

        switch ($request->ruta) {
            case 'Musica':
                $ruta = 'AlbumsController@ShowAlbumstForms';
                break;
            case 'Series':
                $ruta = 'SeriesController@create';
                break;
            case 'Peliculas':
                $ruta = 'MoviesController@create';
                break;
            case 'Libros':
                $ruta = 'BooksController@create';
                break;
        }

    	return redirect()->action( $ruta );
    }

    
    public function ShowPendingTags()
    {
        return view('promoter.ContentModules.ExtraContent.Tags');
    }

    public function DataTableRender()
    {
            
        $Tags = Tags::where('status','=','En Proceso')->with('Seller')->get();
        
        return Datatables::of($Tags)
                                    ->addColumn('Estatus',function($Tags){
                                        
                                        return '<button type="button" class="btn btn-theme" value='.$Tags->id.' data-toggle="modal" data-target="#StatusTags" id="Status">'.$Tags->status.'</button';
                                    })
                                    ->rawColumns(['Estatus'])
                                    ->toJson(); 
    }

    public function AprovalDenial($id,Request $request)
    {
        $Tags=Tags::find($id);
        $Tags->status=$request->status;
        $Tags->save();

        return Response()->json($Tags);
    }

}
