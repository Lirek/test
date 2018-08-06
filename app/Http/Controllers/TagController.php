<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use Laracasts\Flash\Flash;

class TagController extends Controller
{
    public function store(Request $request) {
    	
    	$tag = new Tags;
    	$tag->tags_name 	= ucwords($request->tags_name);
    	$tag->type_tags 	= $request->type_tags;
    	$tag->seller_id 	= $request->seller_id;
    	$tag->save();

    	Flash::success('Se ha registrado '.$tag->tags_name.' de manera exitosa, debe esperar su activación para poder utilizarlo')->important();

    	return redirect()->action(
            'AlbumsController@ShowAlbumstForms'
        );
    }
}
