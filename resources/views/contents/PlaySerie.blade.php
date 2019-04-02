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
.collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle {
            position: absolute;
            width: 42px;
            height: 42px;
            overflow: hidden;
            left: 35px;
            display: inline-block;
            vertical-align: middle;
        }

        .aqua-gradient {
            background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
            background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
            background: linear-gradient(40deg,#2096ff, #9dffac)!important;
        }
        /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>


@endsection

@section('main')



        @if($Series->count() != 0 )


            @foreach($Series as $s)


              <div class="row">

                <div class="col s3">

                </div>
                <div class="col s9">
                  <ul id="tabs-swipe-demo" class="tabs">
                      <li class="tab col s3"><a class="active" href="#test-swipe-1">Trailer</a></li>
                      <li class="tab col s3"><a href="#test-swipe-2">Episodios</a></li>

                    </ul>
                </div>


              </div>
            <div class="row ">
              <div class="col s12 m3">
                <img src="{{asset($s->img_poster)}}" width="100%" height="300px" style="border-radius: 10px" id="lecturaspanel">
             </div>

              <div class="col s12 m9">

                <div class="row">
                  
                  <ul id="tabs-swipe-demo" class="tabs">
                      <li class="tab col s12 m3"><a class="active" href="#test-swipe-1">Trailer</a></li>
                      <li class="tab col s12 m3"><a href="#test-swipe-2">Episodios</a></li>
                      
                    </ul>
                    <div id="test-swipe-1" class="col s12 ">
                      <div class="col s12 " style="color: black">
        
                       <?php
                            $url = $s->trailer;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '800px';
                            $height = '450px';
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
                                  <!-- <li class="collection-item" style="padding: 10px ">
                                      <div class="row">
                                          <div class="col s12 m5">
                                              <i class="material-icons circle left">create</i>
                                              <b class="left">Titulo original: </b>
                                          </div>
                                         <div class="col s12 m7">
                                             {{ $s->original_title }}
                                          </div>
                                      </div>
                                  </li> -->
                                  <li class="collection-item" style="padding: 10px ">
                                      <div class="row">
                                          <div class="col s12 m5">
                                              <i class="material-icons circle left">star</i>
                                             <b class="left">Género: </b>
                                          </div>
                                          <div class="col s12 m7">

                                             @foreach($s->tags_serie as $tag)

                                             <div class="chip  aqua-gradient  white-text">
                                                {{ $tag->tags_name}}
                                            </div>
                                             @endforeach
                                          </div>
                                      </div>
                                  </li>
                                 @if($s->sagas!=null)
                                  <li class="collection-item" style="padding: 10px ">
                                      <div class="row">
                                          <div class="col s12 m5">
                                              <i class="material-icons circle left">folder</i>
                                              <b class="left">Saga: </b>
                                          </div>
                                          <div class="col s12 m7">
                                              {{ $s->saga->sag_name }}
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
                                              {{ $s->cost }} Tickets
                                          </div>
                                      </div>
                                  </li>
                                 <li class="collection-item" style="padding: 10px ">
                                      <div class="row">
                                        @if($adquirido)
                                        @else
                                        <div class="col s12 m4 l4">
                                            <!-- <a  href="#modal-default" class="btn curvaBoton waves-effect waves-light teal center modal-trigger">Leer libro</a> -->
                                            <a class="btn curvaBoton waves-effect waves-light green" href="#" id="buyBook" onclick="fnOpenNormalDialog('{!!$s->cost!!}','{!!$s->title!!}','{!!$s->id!!}')"><i class="material-icons left   ">add_shopping_cart</i>Adquirir</a>
                                        </div>
                                        @endif
                                          <div class="col s12 m4 ">
                                                <a class="btn btn-primary blue curvaBoton   modal-trigger " href="#modal1">Sinopsis</a>

                                          </div>
                                      
                                          <div class="col s12 m4 ">


                                                 <a class="btn blue curvaBoton  " href="{{url('MySeries')}}">ATRÁS</a>

                                          </div>

                                      </div>
                                  </li>
                              </ul>
                            

                            </div>
                    
                    </div>
                    
                    
                    
                    
                    
                    <div id="test-swipe-2" class="col s12">
                      <div class="">
                        
                        <div style="display: none;" id="cap" class="col s12 m10 offset-m1">
                          <video  poster="" id="player" controls >
                            <source src="" type="video/mp4">
                            <source src="" type="video/webm">
                          </video>
                      </div>
                        <div class="col s12 m10 offset-m1" style="color: black">

                        <ul class="collapsible" >
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons">movie</i>
                              Episodios:
                            </div>
                            @if($s->Episode())
                                @foreach($s->Episode as $episode)

                                  @if($episode->status =='Aprobado')
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s4">
                                            <p><a href="{{ $episode->trailer_url }}" class="" target="_blank">{{ $episode->episode_name }}</a></p>
                                            </div>
                                            <div class="col s6">
                                                {{ $episode->sinopsis }}
                                            </div>
                                            @if($adquirido)
                                              <div class="col s2">
                                                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton  " href="#" onclick="Reproducir('{!!$episode->episode_file!!}')"><i class="material-icons">play_circle_outline</i></a>
                                                </div>
                                            @else
                                                @if(in_array($episode->id,$adquiridoE))
                                                 <div class="col s2">
                                                      <a class="btn halfway-fab waves-effect waves-light blue curvaBoton  " href="#" onclick="Reproducir('{!!$episode->episode_file!!}')"><i class="material-icons">play_circle_outline</i></a>
                                                  </div>
                                                @else
                                                  <div class="col s2">
                                                      <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="" onclick="fnOpenNormalDialog2('{!!$episode->cost!!}','{!!$episode->episode_name!!}','{!!$episode->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                                                  </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                  @endif
                                @endforeach
                            @endif                    
          
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
                                             {{ $s->original_title }}
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
                                 @if($s->sagas!=null)
                                  <li class="collection-item" style="padding: 10px ">
                                      <div class="row">
                                          <div class="col s12 m5">
                                              <i class="material-icons circle left">folder</i>
                                              <b class="left">Saga: </b>
                                          </div>
                                          <div class="col s12 m7">
                                              {{ $s->saga->sag_name }}
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
                                              {{ $s->cost }} Tickets
                                          </div>
                                      </div>
                                  </li>
                                 <li class="collection-item" style="padding: 10px ">
                                      <div class="row">

                                          <div class="col s6 ">
                                                <a class="btn btn-primary blue curvaBoton   modal-trigger " href="#modal1">Sinopsis</a>

                                          </div>

                                          <div class="col s6 ">


                                                 <a class="btn blue curvaBoton  " href="{{url('MySeries')}}">ATRÁS</a>

                                          </div>

                                      </div>
                                  </li>
                              </ul>


                            </div>

                    </div>


                      







                  </div>
                </div>




              </div>


            <!-- Modal Structure -->
            <div id="modal1" class="modal bottom-sheet">
              <div class="modal-content">
                <h4 class="header blue" >SINOPSIS</h4>
                <h6>  {{ $s->story }}</h6>
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
                    
            url:'../BuySerie/'+id,
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
                      swal('La serie ya forma parte de su colección','','error');
                    }
                    else
                    {	
                    var idUser={!!Auth::user()->id!!};
                    $.ajax({ 
                
                      url     : '../MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                    	swal('Serie comprada con exito','','success');
                  		 console.log(result);
                       window.setTimeout(function(){window.location.reload()}, 1000);
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
<script>
function fnOpenNormalDialog2(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback2(true,id);
           
          } else {
            callback2(false,id);
          }
        });
    };

function callback2(value,id) {
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
                    
            url:'../BuyEpisode/'+id,
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
                      swal('El episodio ya forma parte de su colección','','error');
                    }
                    else if (result==2) 
                    {
                      swal('La serie completa ya forma parte de colección','','error');
                    }
                    else
                    { 
                    var idUser={!!Auth::user()->id!!};
                    $.ajax({ 
                
                      url     : '../MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                      swal('Episodio comprado con exito','','success');
                       console.log(result);
                       window.setTimeout(function(){window.location.reload()}, 1000);
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
      	source: "SearchSerie",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Serie no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>

<script type="text/javascript">
  function Reproducir(url) {
    document.getElementById("cap").style.display = "block";
    $('#player').attr('src','{{asset('')}}'+url);
  }
</script>
@endsection