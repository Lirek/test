<?php

namespace App\Http\Controllers;
use App\music_authors;
use Illuminate\Http\Request;
use App\Http\Requests\MusicAuthorsRequest;

class ArtistController extends Controller
{
    //

    public function ShowArtistForms()
    {
       return view('seller.music_module.artist_registration');
    }

    public function CreateArtist(MusicAuthorsRequest $request)
    {
       

       
       	$id=$request->id;
    	
    	  $store_path='Music/'.$id.'/profileArtist';     	
        $path = $request->file('photo')->storeAs($store_path,$request->art_name.'.'.$request->file('photo')->getClientOriginalExtension());

    	
       		$music_authors = new music_authors;
       		$music_authors->name = $request->art_name;
       		$music_authors->seller_id = $id;
       		$music_authors->type_authors = $request->type_authors;
       		$music_authors->descripcion = $request->dsc;
       		$music_authors->country = $request->x12;
       		$music_authors->photo = $path;
       		$music_authors->instagram = $request->instagram;
       		$music_authors->facebook = $request->facebook;
       		$music_authors->twitter = $request->twitter;
       		$music_authors->google = $request->google; 
       		$music_authors->save();
     
        Flash('Se ha registrado '. $music_authors->name .' de forma sastisfactoria')->success();
       return view('seller.music_module.artist_registration');

     

    }
}
