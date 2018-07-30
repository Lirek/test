<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use App\Http\Requests\SingleRequest;
use App\music_authors;
use App\Tags;
use App\Albums;
//use wapmorgan\Mp3Info\Mp3Info;
// La libreria anterior se reenplaza por la siguiente;
use App\Http\Controllers\mp3File;
use Laracasts\Flash\Flash;
use App\Songs;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;




class AlbumsController extends Controller
{

/*-------------------------------------------------------------------------------------
---------------------                               ------------------------------------
---------------------        FUNCIONES DE ALBUM     ------------------------------------
---------------------                               ------------------------------------
----------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------
*/

    public function ShowAlbumstForms()
    {

        $tags = Tags::where('status','=','Aprobado')->where('type_tags','=','Musica')->get();
        $autors = music_authors::all();
                
       return view('seller.music_module.album_registration')->with('tags', $tags)->with('autors', $autors);
    }

    public function ModifyAlbum($id)
    {

        $album = Albums::find($id);
        $song = $album->songs()->get();
        $tags = Tags::where('type_tags','=','Musica')->where('status','=','Aprobado')->get();
        $selected = $album->tags_music()->get();
        $autors = $album->autors()->get();
        $i=0;
        $cover = $album->cover;

        return view('seller.music_module.album_modify')->with('tags', $tags)->with('autors', $autors)->with('album', $album)->with('songs', $song)->with('s_tags',$selected)->with('cover',$cover)->with('i',$i)->with('id',$id);
    }
    
    public function UpdateAlbum(Request $request)
    {

        $user = $request->seller_id;
        
        $album = Albums::find($request->id);
        
        $autors = music_authors::find($album->autors_id);
        
        $store_path = public_path().'/Music/'.$autors->name.'/albums/'.$album->name_alb;
        
        
        if($album->name_alb != $request->album) {
            $album->name_alb = $request->album;
        }
        
        if($album->cost != $request->cost) {
            $album->cost = $request->cost;
        }
        
        if($request->hasFile('image')) {
            $name = 'albumcover_'.$request->album.time().'.'.$request->file('image')->getClientOriginalExtension();
            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name;
            File::delete(public_path().$album->cover);
            $request->file('image')->move($store_path, $name);
            $album->cover = $path;
        }

        if ($request->tags!=null) {
            $tags = $request->tags;
            $tags_s = $album->tags_music()->get();
            foreach($tags as $tag) {
                foreach($tags_s as $old) {
                    if($tag != $old->id) {
                        $album->tags_music()->detach();
                        $album->tags_music()->attach($tag);       
                    }
                }
            }
        }

        $i=0;
        
        $songs=$album->songs()->get();
        $song_id = $request->song_id;
        $f=count($song_id);

        foreach($songs as $song) {
            if ($song_id!=null) {
                $song->find($song_id[$i]);
                $song->song_name = $request->song_o[$i];
                $song->save();
                
                list($hr,$min,$seg)=explode(':',$song->duration);
                $minT[]=$min;
                $segT[]=$seg;
                $i++;
            }
        }

        $i=0;

        if($request->audio[0]!=null && $request->audio[0]->isValid()) {
            
            foreach ($request->audio as $song) {
                
                $name=$request->song_n[$i];
                
                $duration_song = $this->DurationSong($song);

                $save[] = $this->SaveSong($song,$duration_song,$album->autors_id,$album->seller_id,$store_path,$name,NULL);

                list($hr,$min,$seg)=explode(':',$duration_song);
                $segT[]=$seg;
                $minT[]=$min;           
                $i++;   
            }
        
        }
        
        $AlbumTime = $this->GetAlbumDuration($minT,$segT);
        
        $album->duration = $AlbumTime;
        $album->cost=$request->cost;
        $album->status=2;
        $album->save();
        
        foreach ($save as $data) {
            $album->songs()->save($data);
        }

        Flash::success('Se ha modificado el Álbum con exito')->important();
        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>Auth::guard('web_seller')->user()->id]
        );

        /*
      $albums = Albums::where('seller_id','=',$user)->simplePaginate(10);
      $singles = Songs::where('seller_id','=',$user)->where('album','=',NULL)->simplePaginate(10);
    
       return view('seller.music_module.music_panel')->with('albums', $albums)->with('singles', $singles);
       */
    }
    
    public function DeleteAlbum($id)
    {

        $album = Albums::find($id);
        $name = $album->Autors()->get();
        $album->tags_music()->detach();
        $song = $album->songs()->get();
        $user= Auth::guard('web_seller')->user()->id;

        foreach ($song as $file) {

            $delete = Songs::find($file->id);
            unlink(public_path().$delete->song_file);
            $delete->delete();

        }

        unlink(public_path().$album->cover);
        rmdir(public_path()."/Music/".$name[0]->name."/albums/".$album->name_alb);
        $album->delete();

        Flash::success('Se ha eliminado el Album con exito')->important();

        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>$user]
        );
        /*
      $albums = Albums::where('seller_id','=',$user)->simplePaginate(10);
      $singles = Songs::where('seller_id','=',$user)->where('album','=',NULL)->simplePaginate(10);
    
       return view('seller.music_module.music_panel')->with('albums', $albums)->with('singles', $singles);
       */

    }

    public function ShowAlbum($id)
    {
      $album =Albums::find($id);
      $singles = $album->songs()->get();
      $cover = $album->cover;
      //dd($cover);
      $x=0;
      return view('seller.music_module.album')->with('album', $album)->with('songs', $singles)->with('cover',$cover)->with('x',$x);
      
    }
    // Funcion que será llamada por al momento de ver un album y devolverá las canciones de dicho album
    public function SongAlbum($id) {

        $album =Albums::find($id);
        $singles = $album->songs()->get();
        return response()->json($singles);

        /*
        $Song= Songs::where('rating_id','=',$id)->get(); 
        return response()->json($Song);
        */
        
    }
    // Funcion que será llamada por al momento de ver un album y devolverá las canciones de dicho album

    public function CreateAlbum(AlbumRequest $request) {

        $seg=0;
        $min=0;
        $hr=0;
        
        $artist = $request->artist;
        $autors = music_authors::find($artist);
        $seller_id = $request->seller_id;
        $store_path = public_path().'/Music/'.$autors->name.'/albums/'.$request->album;
        
        $name = 'albumcover_'.$request->album.time().'.'.$request->file('image')->getClientOriginalExtension();
        
        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name;
        $request->file('image')->move($store_path, $name);
        $i=0;
        $cost=NULL;
        
        foreach ($request->audio as $song) {
            $name=$request->song_n[$i];
            $duration_song = $this->DurationSong($song);

            $save[] = $this->SaveSong($song,$duration_song,$artist,$seller_id,$store_path,$name,$cost);

            list($hr,$min,$seg)=explode(':',$duration_song);
            $segT[]=$seg;
            $minT[]=$min;
            $i++;

        }
        
        $AlbumTime = $this->GetAlbumDuration($minT,$segT);

        $album= new Albums;
        $album->seller_id = $seller_id;
        $album->autors_id= $artist;
        $album->name_alb=$request->album;
        $album->cover=$path;
        $album->duration = $AlbumTime;
        $album->cost=$request->cost;
        $album->status=2;
        $album->save();

        
        $album->tags_music()->attach($request->tags);
        foreach ($save as $data ) {
            $album->songs()->save($data);
        }

        Flash::success('Se ha registrado '.$album->name_alb.' con una duración total de '.$album->duration.' y con un costo de '.$album->cost)->important();

        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>Auth::guard('web_seller')->user()->id]
        );
    }

        public function GetAlbumDuration($minT,$segT)
    {
            $hr = 0;
            $min=array_sum($minT);
            $seg=array_sum($segT);
            
            while ($seg >= 60) 
            {
            if($seg>=60){$min++;}$seg=$seg-60;  
            }

            while ($min >= 60) 
            {
            if($min>=60){$hr++;} $min=$min-60;  
            }

            $AlbumDuration = $hr.':'.$min.':'.$seg;

            return($AlbumDuration);
    }

/*-------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------
-------------------------           FIN DE FUNCIONES DE AlBUM   -----------------------------------
---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------
*/


/*-------------------------------------------------------------------------------------
---------------------                               ------------------------------------
---------------------        FUNCIONES DE SINGLE    ------------------------------------
---------------------                               ------------------------------------
----------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------
*/



    public function ShowSingleForms()
    {
      $tags = Tags::all();
      $autors = music_authors::all();

       return view('seller.music_module.single_registration')->with('tags', $tags)->with('autors', $autors);
    }


        
    public function DurationSong($song) {
      /*
        Comentado por error en la libreria
        $audio = new Mp3Info($song);
        $duration=floor($audio->duration / 60).':'.floor($audio->duration % 60);
      */
      $audio = new MP3File($song);
      $duration = MP3File::formatTime($audio->getDurationEstimate());
      return($duration);
    }


    public function SaveSong($song,$duration_song,$artist,$seller_id,$store_path,$name,$cost) {

        $name1 = 'song_'.$name. time() . '.'. $song->getClientOriginalExtension();

        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name1;
        $file = $song->move($store_path, $name1);

        $albumSongs = new Songs;
        $albumSongs->autors_id = $artist;
        $albumSongs->seller_id = $seller_id;
        $albumSongs->song_file = $path;
        $albumSongs->song_name = $name;
        $albumSongs->cost = $cost;
        $albumSongs->duration = $duration_song;
        $albumSongs->status =2;
        // Pendiente con esta, por si da algun problema al crear un album como tal
        // la linea fue agregada para el registro de una cancion
        $albumSongs->album = 0;
        $albumSongs->save();

        return($albumSongs);
    }

  public function SongConfig(SingleRequest $request)
  {

    $store_path = public_path().'/Music/'.$request->artist.'/singles/'.$ldate = date('Y-m-d');
    $song = $request->file('audio');

    $duration_song = $this->DurationSong($song);
    $artist = $request->artist;
    $seller_id = $request->seller_id;
    $cost = $request->cost;
    $name = $request->song_n;

    $save = $this->SaveSong($song,$duration_song,$artist,$seller_id,$store_path,$name,$cost);
    $save->tags()->attach($request->tags);

    Flash::success('Se ha registrado '.$name.' con una duración total de '.$duration_song.' y con un costo de '.$cost.' Tickets.')->important();
    return redirect()->action(
        'MusicController@ShowMusicPanel',['id'=>Auth::guard('web_seller')->user()->id]
    );
  }


    public function DeleteSong($id) {
        
        $delete = Songs::find($id);
        $album_id= $delete->album;
        $user= Auth::guard('web_seller')->user()->id;
        File::delete(public_path().$delete->song_file);
        $delete->delete();

        if($album_id == NULL or $album_id == 0) {
            Flash::success('Se ha eliminado la canción con exito')->important();
            /*
            $albums = Albums::where('seller_id','=',$user)->simplePaginate(10);
            $singles = Songs::where('seller_id','=',$user)->where('album','=',0)->where('album','=',NULL)->simplePaginate(10);
            return view('seller.music_module.music_panel')->with('albums', $albums)->with('singles', $singles);
            */
            return redirect()->action(
                'MusicController@ShowMusicPanel',['id'=>$user]
            );
        }
        return redirect()->action(
            'AlbumsController@ModifyAlbum',['id'=>$album_id]
        );
        /*
        $album = Albums::find($album_id);
        $song = $album->songs()->get();
        $tags = Tags::where('type_tags','=','Musica')->get();
        $selected = $album->tags_music()->get();
        $autors = $album->autors()->get();
        $i=0;
        $cover = $album->cover;
        return view('seller.music_module.album_modify')->with('tags', $tags)->with('autors', $autors)->with('album', $album)->with('songs', $song)->with('s_tags',$selected)->with('cover',$cover)->with('i',$i)->with('id',$album_id);
        */
      }

    public function UpdateSong(Request $request) {

        $user = Auth::guard('web_seller')->user()->id;
        $single = Songs::find($request->id);
        $single->song_name = $request->song_n;
        $single->cost = $request->cost;
        $single->status = 2;
        if ($request->tags!=null) {
            $tags = $request->tags;
            $tags_s = $single->tags()->get();
            foreach($tags as $tag) {
                foreach($tags_s as $old) {
                    if($tag != $old->id) {
                        $single->tags()->attach($tag);       
                    }
                }
            }
        }

        if ($request->audio!=null) {
            $song = $request->file('audio');
            $duration_song = $this->DurationSong($song);
            $store_path = public_path().'/Music/'.$request->artist.'/singles/'.$ldate = date('Y-m-d');
            $name1 = 'song_'.$request->song_n. time() . '.'. $song->getClientOriginalExtension();
            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name1;
            $file = $song->move($store_path, $name1);

            $single->song_file = $path;
            $single->duration = $duration_song;
        }

        if ($request->artist!=null) {
            $single->autors_id = $request->artist;
        }
    
        $single->save();  

        Flash::success('Se ha Modificado la Canción con exito')->important();
        /*
        $albums = Albums::where('seller_id','=',$user)->simplePaginate(10);
        $singles = Songs::where('seller_id','=',$user)->where('album','=',NULL)->simplePaginate(10);
        return view('seller.music_module.music_panel')->with('albums', $albums)->with('singles', $singles);
        */
        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>$user]
        );
    
    }

        public function ModifySong($id)
        {
            
            $song = Songs::find($id);
            $tags = Tags::all();
            $artist = music_authors::all();
            $selected = $song->tags()->get();
            
            return view('seller.music_module.single_modify')->with('tags', $tags)->with('artist', $artist)->with('s_tags',$selected)->with('song',$song)->with('id',$id);
        }
        
        

/*-------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------
-------------------------           FIN DE FUNCIONES DE SINGLE  -----------------------------------
---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------
*/

  public function SaveTag(Request $request)
  {
            $data = new Tags;
            $data->tags_name = $request->name;
            $data->type_tags ='Musica';
            $data->status  = 'En Proceso';
            $data->save ();
            return response()->json($data);
  }

 }
