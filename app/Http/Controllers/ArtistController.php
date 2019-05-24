<?php

namespace App\Http\Controllers;
use App\music_authors;
use Illuminate\Http\Request;
use App\Http\Requests\MusicAuthorsRequest;
use Laracasts\Flash\Flash;
use Auth;
use File;
use App\Seller;
use App\Songs;
use App\Albums;

class ArtistController extends Controller
{
    public function ShowArtistForms()
    {
      return view('seller.music_module.artist_registration');
    }

    public function CreateArtist(MusicAuthorsRequest $request) {

      $store_path = public_path().'/Music/'.$request->id.'/profileArtist';
      $photo = $request->file('photo');
      $name1 = $request->art_name.'.'.$photo->getClientOriginalExtension();
      list($e,$real_path)=explode(public_path(),$store_path);
      $path = $real_path .'/'.$name1;
      $file = $photo->move($store_path, $name1);

      $music_authors = new music_authors;
      $music_authors->name = $request->art_name;
      $music_authors->seller_id = $request->id;
      $music_authors->type_authors = $request->type_authors;
      $music_authors->descripcion = $request->dsc;
      $music_authors->country = $request->x12;
      $music_authors->photo = $path;
      $music_authors->instagram = $request->instagram;
      $music_authors->facebook = $request->facebook;
      $music_authors->twitter = $request->twitter;
      $music_authors->google = $request->google; 
      $music_authors->save();

      Flash::success('Se ha registrado '.$music_authors->name.' de forma sastisfactoria')->important();

      $seller = Seller::find(Auth::guard('web_seller')->user()->id);

      foreach($seller->roles as $mod) {
        if($mod->name == 'Productora') {
          return redirect()->action(
            'ArtistController@showArtist'
          );
        }
        if($mod->name == 'Artista') {
          return redirect()->action(
            'ArtistController@modify_artist'
          );
        }
      }

    }

    public function modify_artist() {

      $music_authors = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();
      return view('seller.music_module.artist_modify')->with('author',$music_authors);
    }

    public function save_modify_artist(Request $request) {

      $music_authors = music_authors::find($request->id_author);

      if($request->photo!=null) {

        File::delete(public_path().$music_authors->photo);

        $store_path = public_path().'/Music/'.$request->id.'/profileArtist';
        $photo = $request->file('photo');
        $name1 = $request->art_name.'.'.$photo->getClientOriginalExtension();
        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name1;
        $file = $photo->move($store_path, $name1);

        $music_authors->photo = $path;
      }

      if ($request->x12!=null) {
        $music_authors->country = $request->x12;
      }

      $music_authors->name  = $request->art_name;
      $music_authors->type_authors  = $request->type_authors;
      $music_authors->descripcion = $request->dsc;
      $music_authors->instagram = $request->instagram;
      $music_authors->facebook = $request->facebook;
      $music_authors->twitter = $request->twitter;
      $music_authors->google = $request->google;
      $music_authors->save();

      Flash::success('Se ha modificado '.$music_authors->name.' de forma sastisfactoria')->important();
      
      $seller = Seller::find(Auth::guard('web_seller')->user()->id);

      foreach($seller->roles as $mod) {
        if($mod->name == 'Productora') {
          return redirect()->action(
            'ArtistController@showArtist'
          );
        }
        if($mod->name == 'Artista') {
          return redirect()->action(
            'ArtistController@modify_artist'
          );
        }
      }
    }

    public function showArtist() {
      
      $artists = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->orderBy('id', 'DESC')->get();
      return view('seller.music_module.artist')->with('artists',$artists);
    }

    public function editArtist($id) {

      $music_authors = music_authors::where('id',$id)->get();
      return view('seller.music_module.artist_modify')->with('author',$music_authors);
    }

    public function deleteArtist($id) {

      $artist = music_authors::find($id);
      if (count($artist->songs)>=1) {
        $artist = music_authors::find($id);
        foreach ($artist->songs as $s) { 
          if ($s->album==0) {
            $single = Songs::find($s->id);
            File::delete(public_path().$single->song_file);
            $single->delete();
          }
          if ($s->album>=1) {
            $album = Albums::find($s->album);
            if (count($album)!=0) {
              $song = $album->songs;
              foreach ($song as $cancion) {
                File::delete(public_path().$cancion->song_file);
                $cancion->delete();
              }
              File::delete(public_path().$album->cover);
              $album->tags_music()->detach();
              $album->delete();
            }
          }
        }
      }
      File::delete(public_path().$artist->photo);
      $artist->delete();

      Flash::success('Se ha eliminado el artista de forma sastisfactoria')->important();

      return redirect()->action(
        'ArtistController@showArtist'
      );
    }
}
