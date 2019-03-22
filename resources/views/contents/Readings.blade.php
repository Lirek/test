@extends('layouts.app')

@section('css')
<link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style>

    .swal-button--confirm {
      background-color: #4caf50;
    }
      .swal-button--confirm {
      color: : white;
    }


</style>
@endsection

@section('main')
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content white-text">
                <h4 class="titelgeneral"><i class="material-icons small">book</i> Lectura</h4>
                <div class="row">
                    <div class="input-field col s12 m6 offset-m3">
                        <form method="POST"  id="SaveSong" action="{{url('SearchProfileAuthor')}}">
                            {{ csrf_field() }}
                            <i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar lectura</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @if($Lecturas->count() != 0 )
                        @foreach($Lecturas as $lecturas)
                        <div class="col s12 m4 l3">
                          <div class="card" style="height:100%">
                            <div class="card-image">
                              @if($lecturas->books_file)
                              <a href="#myModal-{{$lecturas->id}}" class="modal-trigger">
                              <img src="{{ asset('/images/bookcover') }}/{{ $lecturas->cover }}" width="100%" height="300px"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$lecturas->id}}" onclick="fnOpenNormalDialog('{!!$lecturas->cost!!}','{!!$lecturas->title!!}','{!!$lecturas->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                              @else
                              <a href="#myModalMeg-{{$lecturas->id}}" class="modal-trigger">
                              <img src="{{asset($lecturas->cover)}}" width="100%" height="300px"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$lecturas->id}}" onclick="fnOpenNormalDialogMeg('{!!$lecturas->cost!!}','{!!$lecturas->title!!}','{!!$lecturas->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                              @endif
                            </div>
                            <div class="card-content">
                                <div class="col m12 s12">
                                  <p class="grey-text truncate">{{ $lecturas->title }}</p>
                                </div>
                                <div class="col m12 s12">
                                  <p class="grey-text truncate"><b>Autor: </b>{{$lecturas->seller->name}}</p>
                                </div>
                                <div>
                                  <p class="grey-text"><b>Costo: </b> {{$lecturas->cost}} tickets </p>
                                </div>
                                <div class="col m12 s12">
                                <div class="grey-text">
                                  @if($lecturas->books_file)
                                <p><b>Libro</b></p>
                                 @else
                                <p><b>Revista</b></p>
                                 @endif
                               </div>
                                </div> 
                            </div>
                          </div>
                        </div>

                        <!--MODAL DETALLE DE LIBRO-->
                             @if($lecturas->books_file)
                                  <div id="myModal-{{$lecturas->id}}" class="modal">
                                  @else
                                  <div id="myModalMeg-{{$lecturas->id}}" class="modal">
                             @endif
                       
                            <div class="modal-content">
                                <div class="blue"><br>
                                    <h4 class="center white-text" ><i class="small material-icons">book</i> {{$lecturas->title}}</h4>
                                    <br>
                                </div>
                                <div class="col s12 m4 offset-m1">
                             <br>

                              @if($lecturas->books_file)
                              <a href="#myModal-{{$lecturas->id}}" class="modal-trigger">
                              <img src="{{ asset('/images/bookcover') }}/{{ $lecturas->cover }}" width="100%" height="300"  id="panel"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a  class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$lecturas->id}}" onclick="fnOpenNormalDialog('{!!$lecturas->cost!!}','{!!$lecturas->title!!}','{!!$lecturas->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                              @else
                              <a href="#myModal-{{$lecturas->id}}" class="modal-trigger">
                              <img src="{{asset($lecturas->cover)}}" width="100%" height="300"  id="panel"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a  class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$lecturas->id}}" onclick="fnOpenNormalDialogMeg('{!!$lecturas->cost!!}','{!!$lecturas->title!!}','{!!$lecturas->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                              @endif
                              <br><br>
                                </div>
                            </div>
                            <div class="col m7 s12">
                                <br>
                            <ul class="collection z-depth-1" style="color: black">
                                <!-- <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">create</i>
                                            <b class="left">Titulo original: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            {{$lecturas->original_title}}
                                        </div>
                                    </div>
                                </li> -->
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">turned_in</i>
                                            <b class="left">Géneros: </b>
                                        </div>
                                        <div class="col s12 m7">
                                             
                                             @if($lecturas->books_file)
                                                @foreach($lecturas->tags_book as $t)
                                                <span class=""> {{ $t->tags_name }} </span>
                                               @endforeach
                                             @else
                                               @foreach($lecturas->tags_megazines as $t)
                                                <span class=""> {{ $t->tags_name }} </span>
                                               @endforeach
                                             @endif


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
                                            {{ $lecturas->rating->r_name }}
                                        </div>
                                    </div>
                                </li>

                           @if($lecturas->books_file)
                                @if($lecturas->saga!=null)
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">folder</i>
                                            <b class="left">Saga: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            {{ $lecturas->saga->sag_name }}
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
                              @else
                                @if($lecturas->sagas!=null)
                                <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">folder</i>
                                        <b class="left">Tipo de publicación: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        {{ $lecturas->sagas->sag_name }}
                                    </div>
                                </div>
                            </li>
                            @else
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">folder</i>
                                        <b class="left">Tipo de publicación: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        Independiente
                                    </div>
                                </div>
                            </li>
                            @endif
                           @endif
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">local_play</i>
                                            <b class="left">Costo: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            {{ $lecturas->cost }} Tickets
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            </div>
                      <div class="col s12 m12" style="color: black">
                            <div class="card-panel">
                             
                              
                               @if($lecturas->books_file)
                                <b class="left">Sinopsis:</b>
                                  <p>{{ $lecturas->sinopsis }}</p>
                                  @else
                                   <b class="left">Descripción:</b>
                                  <p>{{ $lecturas->descripcion }}</p>
                               @endif
                              
                            </div>
                      </div>
                            <div class="col s12 m12">
                                <div class="modal-footer">
                                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="row center">
                            <div class="col s12 m12">
                                <!--  Paginacion material -->
                                <?php /*Nuevo*/ $Lecturas->setPath('') ?>
                                {!!$Lecturas->appends(Input::except('page'))->render() !!}
                            </div>
                        </div>
                        
                    @else
                    <div class="col m12">
                    <blockquote >
                        <i class="material-icons fixed-width large grey-text">book</i><br><h5 class="grey-text">No hay lecturas disponibles</h5>
                    </blockquote>
                    <br>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

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
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#seach').keyup(function(evento){
        $('#buscar').attr('disabled',true);
    });
    $('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
        source: "SearchAuthor",
        minLength: 2,
        select: function(event, ui){        
            $('#seach').val(ui.item.value);
            var valor = ui.item.value;
          console.log(ui.item.type);
            if (valor=='No se encuentra...'){
                $('#buscar').attr('disabled',true);
                swal('No se encuentra regitrado','','error');
            }else{
            $('#type').val(ui.item.type);
                $('#buscar').attr('disabled',false);
            }
        }

   });
  });
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
                    
            url:'BuyBook/'+id,
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
                      swal('El libro ya forma parte de su colección','','error');
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
                        swal('Libro comprado con exito','','success');
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


<script>
function fnOpenNormalDialogMeg(cost,name,id) {
  
   swal({
            title: "Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callbackMeg(true,id);
           
          } else {
            callbackMeg(false,id);
          }
        });
    };

function callbackMeg(value,id) {
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
                    
            url:'BuyMagazines/'+id,
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
                      swal('La revista ya forma parte de su colección','','error');
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
                      swal('Revista comprada con exito','','success');
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
@endsection