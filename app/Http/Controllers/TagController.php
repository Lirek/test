<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use App\Rejection;
use App\SellersRoles;
use Laracasts\Flash\Flash;
use Yajra\Datatables\Datatables;
class TagController extends Controller {

    public function store(Request $request) {
    	$tag = new Tags;
    	$tag->tags_name 	= ucwords($request->tags_name);
    	$tag->type_tags 	= $request->type_tags;
        if (array_key_exists('seller_id', $request->all())) {
            $tag->seller_id     = $request->seller_id;
        } else {
            $tag->status = "Aprobado";
        }
    	$tag->save();
        return Response()->json(0);
    }

    public function ShowPendingTags() {
        $modulos = SellersRoles::whereNotIn('name',['Productora','Artista','Editorial','Escritor'])->get();
        return view('promoter.ContentModules.ExtraContent.Tags')->with('modulos',$modulos);
    }

    public function DataTableRender($status) {
        $Tags = Tags::where('status',$status)->with('Seller')->get();
        return response()->json($Tags);
    }

    public function AprovalDenial(Request $request,$id) {
        $Tags = Tags::find($id);
        $Tags->status = $request->status;
        if ($request->status=="Denegado") {
            $rejection = new Rejection;
            $rejection->module = "Tags";
            $rejection->id_module = $id;
            $rejection->reason = $request->reason;
            $rejection->save();
        }
        $Tags->save();
        return Response()->json($Tags);
    }

    public function edit($id) {
        $Tags = Tags::find($id);
        return Response()->json($Tags);
    }

    public function update(Request $request) {
        $Tags = Tags::find($request->idTag);
        $Tags->tags_name = ucwords($request->tags_name);
        $Tags->type_tags = $request->type_tags;
        $Tags->save();
        return Response()->json($Tags);
    }

    public function delete($id) {
        $Tag = Tags::destroy($id);
        return Response()->json($Tag);
    }

}
