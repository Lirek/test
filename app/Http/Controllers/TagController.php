<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;


use Yajra\Datatables\Datatables;

class TagController extends Controller
{


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
