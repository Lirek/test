@extends('layouts.app')

@section('css')

<style >
.header {
    color: white;
    font-weight: 150;
}

#tabs-swipe-demo{
  margin-bottom: 50px;
}

.embed-container{
  position: relative;
  padding-bottom: 56.25%;
  height: 0;
  overflow: hidden;
  
}

.embed-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
  
}
.embed-container video{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
  
}
</style>


@endsection

@section('main')

       @if($movie->count() != 0 )

       @foreach($movie as $m)
       
       
       <div class="row">
         <div class="col s3">
           
         </div>
         <div class="col s9">
           <ul id="tabs-swipe-demo" class="tabs">
               <li class="tab col s3"><a class="active" href="#test-swipe-1">Trailer</a></li>
               <li class="tab col s3"><a href="#test-swipe-2">Pelicula</a></li>
               
             </ul>
         </div>
        
       </div>
        <div class="row ">
          
          <div class="col s12 m3">
            
            <img src="../movie/poster/{{$m->img_poster}}" width="100%" height="520px"style="">
            
          </div>
        

          <div class="col m8 s12">

            <div class="row">
              
                <div id="test-swipe-1" class="col s12 ">
                  <div class="col s12 " style="color: black">

    
                   <?php
                        $url = $m->trailer_url;
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1];
                        $width = '1000px';
                        $height = '600px';
                    ?>
                    <div class="embed-container">
                    <iframe  type="text/html" width="700" height="420"
                        src="https://www.youtube.com/embed/{{ $id }}"
                        frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                    </div>
                    
                  </div>
                  
                  <div class="col m12 s12">
                    <br>
                          <ul class="collection z-depth-1" style="color: black">
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">create</i>
                                          <b class="left">Titulo original: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->original_title }}
                                      </div>
                                  </div>
                              </li>
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">star</i>
                                          <b class="left">Categoria: </b>
                                      </div>
                                      <div class="col s12 m7">
                                      </div>
                                  </div>
                              </li>
                             @if($m->sagas!=null)
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">folder</i>
                                          <b class="left">Saga: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->saga->sag_name }}
                                      </div>
                                  </div>
                              </li>
                              @else
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">folder</i>
                                          <b class="left">Saga: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          No pertenece a una saga
                                      </div>
                                  </div>
                             </li>
                             @endif
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">local_play</i>
                                          <b class="left">Costo: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->cost }} Tickets
                                      </div>
                                  </div>
                              </li>
                             <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      
                                      <div class="col s6 ">
                                            <a class="btn btn-primary blue curvaBoton   modal-trigger " href="#modal1">Sinopsis</a>

                                      </div>
                                
                                      <div class="col s6">

                                             <a class="btn blue curvaBoton  " href="{{url('MyMovies')}}">ATRÁS</a>

                                      </div>

                                  </div>
                              </li>
                          </ul>
                        </div>
                
                </div>
                
                
                
                @if($adquirido )

                <div id="test-swipe-2" class="col s12">
                  
                  <div class="embed-container">
        
                      <video width="700" height="420" controls>
                        <source src="../movie/film/{{$m->duration}}" type="video/mp4">
                          <video>
                  </div>
                  
                  <div class="col m12 s12">
                    <br>
                          <ul class="collection z-depth-1" style="color: black">
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">create</i>
                                          <b class="left">Titulo original: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->original_title }}
                                      </div>
                                  </div>
                              </li>
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">star</i>
                                          <b class="left">Categoria: </b>
                                      </div>
                                      <div class="col s12 m7">
                                      </div>
                                  </div>
                              </li>
                             @if($m->sagas!=null)
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">folder</i>
                                          <b class="left">Saga: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->saga->sag_name }}
                                      </div>
                                  </div>
                              </li>
                              @else
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">folder</i>
                                          <b class="left">Saga: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          No pertenece a una saga
                                      </div>
                                  </div>
                             </li>
                             @endif
                              <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      <div class="col s12 m5">
                                          <i class="material-icons circle left">local_play</i>
                                          <b class="left">Costo: </b>
                                      </div>
                                      <div class="col s12 m7">
                                          {{ $m->cost }} Tickets
                                      </div>
                                  </div>
                              </li>
                             <li class="collection-item" style="padding: 10px ">
                                  <div class="row">
                                      
                                      <div class="col s6 ">
                                            <a class="btn btn-primary blue curvaBoton   modal-trigger " href="#modal1">Sinopsis</a>

                                      </div>
                                
                                      <div class="col s6">

                                             <a class="btn blue curvaBoton  " href="{{url('MyMovies')}}">ATRÁS</a>

                                      </div>

                                  </div>
                              </li>
                          </ul>
                        </div>
                            
                </div>
                
                @else
                <div id="test-swipe-2" class="col s12">
                  <div class="embed-container"  id="peliculaSinAdquirir" >
                      <h5>Para poder visualizar la pelicula es necesario haberla adquirido previamente:</h5>
                      <a class="btn btn-primary blue curvaBoton" href="#" id="modal-confir.{{$m->id}}" onclick="fnOpenNormalDialog('{!!$m->cost!!}','{!!$m->title!!}','{!!$m->id!!}')">Adquirir Pelicula</a>
                  </div>
                  
                  <div class="embed-container" id="peliculaAdquirida"  hidden>
        
                      <video width="700" height="420" controls>
                        <source src="../movie/film/{{$m->duration}}" type="video/mp4">
                          <video>
                  </div>
                            
                </div>
                
                
                
                
                @endif



              </div>
            </div>
          </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
          <div class="modal-content">
            <h4 class="header blue" >SINOPSIS</h4>
            <h6>  {{ $m->based_on }}</h6>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
          </div>
        </div>

        @endforeach

       @endif







@endsection


@section('js')
<script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function fnOpenNormalDialog(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback(true,id);
           
          } else {
            callback(false,id);
          }
        });
    };

function callback(value,id) {
    if (value) {
      swal({
                title: 'Procesando..!',
                text: 'Por favor espere..',
                buttons: false,
                closeOnEsc: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
         $.ajax({
                    
            url:'../BuyMovie/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes tickets, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('La pelicula ya forma parte de su colección','','error');
                    }
                    else
                    { 
                    var idUser={!!Auth::user()->id!!};
                    $.ajax({ 
                
                      url     : 'MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                      swal('Pelicula comprada con exito','','success');
                      $('#peliculaAdquirida').show();
                      $('#peliculaSinAdquirir').hide();

                       console.log(result);
                                 
                    }  
                },
              error: function (result) 
                {
                      
                }

            });
    } else {
        return false;
    }
}
</script>
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchMovie",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Pelicula no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
@endsection