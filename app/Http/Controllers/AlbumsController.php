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
        $autors = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();
                
        return view('seller.music_module.album_registration')->with('tags', $tags)->with('autors', $autors);
    }

    public function musicFromAlbum($idAlbum) {
        $album = Albums::find($idAlbum);
        $song = $album->songs()->get();
        return response()->json($song);
    }

    public function ModifyAlbum($id)
    {

        $album = Albums::find($id);
        $song = $album->songs()->get();
        $tags = Tags::where('type_tags','=','Musica')->where('status','=','Aprobado')->get();
        $selected = $album->tags_music()->get();
        $autors = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();
        $i=0;
        $cover = $album->cover;
        //dd($autors);

        return view('seller.music_module.album_modify')
                    ->with('tags', $tags)
                    ->with('autors', $autors)
                    ->with('album', $album)
                    ->with('songs', $song)
                    ->with('s_tags',$selected)
                    ->with('cover',$cover)
                    ->with('i',$i)
                    ->with('id',$id);
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
            $album->tags_music()->detach();
            foreach($tags as $tag) {
                $album->tags_music()->attach($tag);
            }
        }

        if ($request->artist!=null) {
            $artist = $request->artist;
            $album->autors_id = $artist;
        }

        $i=0;
        
        $songs=$album->songs()->get();
        $song_id = $request->song_id;
        $f=count($song_id);

        foreach($songs as $song) {
            if ($song_id!=null) {
                $song->find($song_id[$i]);
                $song->song_name = $request->song_o[$i];
                $song->cost=$request->costpisodio[$i];
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
                $cost=$request->costpisodio[$i];
                $duration_song = $this->DurationSong($song);

                $save[] = $this->SaveSong($song,$duration_song,$album->autors_id,$album->seller_id,$store_path,$name,$cost);

                list($hr,$min,$seg)=explode(':',$duration_song);
                $segT[]=$seg;
                $minT[]=$min;           
                $i++;   
            }

            foreach ($save as $data) {
                $album->songs()->save($data);
            }
        
        }
        
        $AlbumTime = $this->GetAlbumDuration($minT,$segT);
        
        $album->duration = $AlbumTime;
        $album->cost=$request->cost;
        $album->save();


        Flash::success('Se ha modificado el álbum con exito')->important();
        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>Auth::guard('web_seller')->user()->id]
        );
    }
    
    public function DeleteAlbum($id) {

        $album = Albums::find($id);
        $name = $album->Autors()->get();
        $song = $album->songs()->get();
        $user= Auth::guard('web_seller')->user()->id;

        foreach ($song as $s) {

            File::delete(public_path().$s->song_file);
            $s->delete();

        }

        File::delete(public_path().$album->cover);
        $album->tags_music()->detach();
        $album->delete();

        Flash::success('Se ha eliminado el álbum con éxito')->important();

        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>$user]
        );

    }

    public function ShowAlbum($id)
    {
      $album =Albums::find($id);
      $singles = $album->songs()->get();
      $cover = $album->cover;
      $x=0;
      return view('seller.music_module.album')->with('album', $album)->with('songs', $singles)->with('cover',$cover)->with('x',$x);
      
    }

    // Funcion que será llamada por al momento de ver un album y devolverá las canciones de dicho album
    public function SongAlbum($id) {

        $album =Albums::find($id);
        $singles = $album->songs()->get();
        return response()->json($singles);
        
    }
    // Funcion que será llamada por al momento de ver un album y devolverá las canciones de dicho album

    public function CreateAlbum(AlbumRequest $request) {

        $seg=0;
        $min=0;
        $hr=0;
        //dd($request->all());
        $artist = $request->artist;
        $autors = music_authors::find($artist);
        $seller_id = $request->seller_id;
        $store_path = public_path().'/Music/'.$autors->name.'/albums/'.$request->album;
        
        $name = 'albumcover_'.$request->album.time().'.'.$request->file('image')->getClientOriginalExtension();
        
        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name;
        $request->file('image')->move($store_path, $name);
        $i=0;
        
        
        foreach ($request->audio as $song) {
            $name=$request->song_n[$i];
            $cost=$request->costpisodio[$i];
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



    public function ShowSingleForms() {

        //$tags = Tags::all();
        $tags = Tags::where('status','=','Aprobado')->where('type_tags','=','Musica')->get();
        //$autors = music_authors::all();
        $autors = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();

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

        // Pendiente con estas, por si da algun problema al crear un album como tal
        // la linea fue agregada para el registro de una cancion
        // $albumSongs->album = 0;
        // $albumSongs->save();

        return($albumSongs);
    }

  public function SongConfig(SingleRequest $request)
  {

    // dd($request->all());
    $store_path = public_path().'/Music/'.$request->artist.'/singles/'.$ldate = date('Y-m-d');
    $song = $request->file('audio');

    $real_path='/Music/'.$request->artist.'/singles/'.$ldate = date('Y-m-d');
    $duration_song = $this->DurationSong($song);
    $artist = $request->artist;
    $seller_id = $request->seller_id;
    $cost = $request->cost;
    $name = $request->song_n;

    // $save = $this->SaveSong($song,$duration_song,$artist,$seller_id,$store_path,$name,$cost);
   $this->sinAcento($name1 = 'song_'.$name. time() . '.'. $song->getClientOriginalExtension());

        list($e,$real_path)=explode(public_path(),$store_path);
        $path = $real_path .'/'.$name1;
        $file = $song->move($store_path, $name1);

    

    $song=new Songs;
        $song->autors_id = $artist;
        $song->seller_id = $seller_id;
        $song->song_file = $path;
        $song->song_name = $name;
        $song->cost = $cost;
        $song->duration = $duration_song;
        $song->status =2;
        $song->album =NULL;
        if ($request->status ==='Aprobado') {
            $store_path = public_path().'/Music/'.$request->artist.'/singles/'.$name;
            
            $name = 'singlecover_'.$request->seller_id.time().'.'.$request->file('img_poster')->getClientOriginalExtension();
            
            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name;
            $request->file('img_poster')->move($store_path, $name); 
            $song->cover=$path;
        }
    $song->save();

    $song->tags()->attach($request->tags);

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

        if($album_id == NULL || $album_id == 0) {
            Flash::success('Se ha eliminado la canción con exito')->important();
            return redirect()->action(
                'MusicController@ShowMusicPanel',['id'=>$user]
            );
        }

        $album = Albums::find($album_id);
        $songs=$album->songs()->get();
        if (count($songs)!= 0) {

            foreach($songs as $song) {
                    
                list($hr,$min,$seg)=explode(':',$song->duration);
                $minT[]=$min;
                $segT[]=$seg;
            }
            $AlbumTime = $this->GetAlbumDuration($minT,$segT);
        } else {
            $AlbumTime = "00:00:00";
        }

        $album->duration = $AlbumTime;
        $album->seller_id = $album->seller_id;
        $album->save();

        Flash::success('Se ha eliminado la canción con exito')->important();
        return redirect()->action(
            'AlbumsController@ModifyAlbum',['id'=>$album_id]
        );
      }

    public function UpdateSong(Request $request) {

        $user = Auth::guard('web_seller')->user()->id;
        $single = Songs::find($request->id);
        $single->song_name = $request->song_n;
        $single->cost = $request->cost;
        $single->status = 2;
        
        if ($request->tags!=null) {
            $tags = $request->tags;
            $single->tags()->detach();
            foreach($tags as $tag) {
                $single->tags()->attach($tag);
            }
        }

        if ($request->audio!=null) {
            $song = $request->file('audio');
            $duration_song = $this->DurationSong($song);
            $store_path = public_path().'/Music/'.$request->artist.'/singles/'.$ldate = date('Y-m-d');
            $name1 = $this->sinAcento('song_'.$request->song_n. time() . '.'. $song->getClientOriginalExtension());
            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name1;
            $file = $song->move($store_path, $name1);

            $single->song_file = $path;
            $single->duration = $duration_song;
        }

        if ($request->artist!=null) {
            $single->autors_id = $request->artist;
        }
        if ($request->hasFile('img_poster')) {
            $store_path = public_path().'/Music/'.$request->artist.'/singles/'. $request->song_n;
            
            $name = 'singlecover_'.$request->seller_id.time().'.'.$request->file('img_poster')->getClientOriginalExtension();
            
            list($e,$real_path)=explode(public_path(),$store_path);
            $path = $real_path .'/'.$name;
            $request->file('img_poster')->move($store_path, $name); 
            $single->cover=$path;
        }
        if($request->status == 'Denegado'){
            $single->cover=NULL;
        }
    
        $single->save();  

        Flash::success('Se ha Modificado la Canción con exito')->important();
        return redirect()->action(
            'MusicController@ShowMusicPanel',['id'=>$user]
        );
    
    }

        public function ModifySong($id)
        {
            
            $song = Songs::find($id);
            $selected = $song->tags()->get();
            $tags = Tags::where('type_tags','=','Musica')->where('status','=','Aprobado')->get();
            $artist = music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get();
            return view('seller.music_module.single_modify')->with('tags', $tags)->with('autors', $artist)->with('s_tags',$selected)->with('song',$song)->with('id',$id);
        }

    public function ShowSong($id)
    {
      $singles =Songs::find($id);
      // $singles = $album->songs()->get();
      // $cover = $album->cover;
      $x=0;
      return view('seller.music_module.songs')->with('song', $singles);
      
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

  public function sinAcento($cadena) {
        $originales =  'ÀÁÂÃÄÅÆàáâãäåæÈÉÊËèéêëÌÍÎÏìíîïÒÓÔÕÖØòóôõöðøÙÚÛÜùúûÇçÐýýÝßÞþÿŔŕÑñ';
        $modificadas = 'AAAAAAAaaaaaaaEEEEeeeeIIIIiiiiOOOOOOoooooooUUUUuuuCcDyyYBbbyRrÑñ';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        $cadena = trim($cadena);
        $cadena = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
            " "),
        ' ',
        $cadena
    );
        return $cadena;
    }
 }
