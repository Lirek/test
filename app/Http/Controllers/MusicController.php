<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\music_authors;
use App\Tags;
use App\Albums;
use App\Songs;


class MusicController extends Controller
{
    //

    public function ShowMusicPanel($id)
    {
    	$albums = Albums::where('seller_id','=',$id)->simplePaginate(10);
    	$singles = Songs::where('seller_id','=',$id)->where('album','=',NULL)->simplePaginate(10);
    	$x=0;
        return view('seller.music_module.music_panel')->with('albums', $albums)->with('singles', $singles)->with('x',$x);
    }

    public function ShowMusicOfMyPanel($id) {
    	$singles = Songs::where('seller_id','=',$id)->where('album','=',NULL)->get();
    	return response()->json($singles);
    }
}
