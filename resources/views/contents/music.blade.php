@extends('layouts.app')


@section('main')

<div class="container">
 <div class="row">
 
    <div class="col s6">
      <div class="card-panel teal">
        <h3 class="whte"><span class="white-text">Artistas Y Agrupaciones</span></h3>
        <div class="divider"></div>
         <div class="carousel">
           @foreach($MusicAuthors as $MusicAuthor)
            <div class="carousel-item">
            <a href=""><img src="{{asset($MusicAuthor->photo)}}"></a>
            
            <a href="{{url('ProfileMusicArtist/'.$MusicAuthor->id)}}" style="margin-left: 25px" class="waves-effect waves-light btn green center">
              <span class="white-text">{{$MusicAuthor->name}}</span>
            
            </a>

            </div>
          @endforeach
        </div>
      </div>
    </div>
  
    <div class="col s6" >
      <div class="card-panel whithe">
        <h3 class="whte"><span class="black-text">Singles Mas Sonados</span></h3>
        <div class="divider"></div>
         <div class="carousel">
          @foreach($Singles as $Single)
            <div class="carousel-item">
              <p>{{$Single->song_name}}</p>
            <a href=""><img src="{{asset($Single->autors->photo)}}"></a>
            
            <a class="waves-effect waves-light btn blue" value="{{$Single->cost}}" value1="{{$Single->song_name}}" value2="{{$Single->id}}" id="modal">
              <span class="white-text">   
                <i class="fas fa-ticket-alt"></i>
                {{$Single->cost}}
              </span>            
            </a>

            </div>
          @endforeach
        </div>
      </div>
    </div>
 </div>

<div class="row">
  <div class="col s7">
      <div class="card-panel white">
        <table id="singles">
          <thead>
          
          <tr>
              <th>Nombre</th>
              <th>Duracion</th>
              <th>Artista</th>
              <th>Costo</th>
          </tr>
        </thead>
          <tbody>

          </tbody>
        </table>
      </div>
  </div>
</div>

@endsection

  <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content teal">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-footer teal">
         <form method="POST"  id="SaveSong">
                              {{ csrf_field() }}
            <button class="btn waves-effect waves-light glyphicon-screenshot" type="submit" name="action">Comprar
           <i class="material-icons right">send</i>
          </button>

        </form>
      </div>
    </div>

@section('js')
<script>

  $(document).on('click', '#modal', function() { 

    var modal = document.getElementById('modal1');
    var jquerymodal = $(modal);
    var name;
    var cost;

     cost=$(this).attr('value');
     name=$(this).attr('value1');
     id=$(this).attr('value2');

     jquerymodal.find('.modal-title').text( 'Desea Comprar '+name+' ¿Con Un Valor de '+cost+' tickets?');

    jquerymodal.openModal();

                 $( "#SaveSong" ).on( 'submit', function(e){
                  e.preventDefault();
                
                $.ajax({
                    
                    url:'BuySong/'+id,
                    type: 'POST',
                    data: {
                        _token: $('input[name=_token]').val()
                        },
                    
                    success: function (result) 
                    {
                      swal('Cancion Comprada Con Exito','','success');

                      if (result==0) 
                        { 
                          swal('No Posee Suficientes Creditos Por Favor Recargue','','error');  
                        }
                      if (result==1) 
                      {
                        swal('La Cancion Ya Forma Parte de Su Coleccion','','error');
                      }
                    },
                    error: function (result) 
                    {
                      
                    }

                });


             });
  });

  $(document).ready(function(){
    $('.carousel').carousel();

            $('#singles').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ Singles",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No Existen Singles Registrados",
                    "sInfo":           "Mostrando Singles del _START_ al _END_ de un total de _TOTAL_ Singles",
                    "sInfoEmpty":      "Mostrando Singles del 0 al 0 de un total de 0 Singles",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ Singles)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('AllSingles') }}",
                "columns": [
                             {data: 'song_name', name: 'song_name'},
                             {data: 'duration', name: 'duration'},
                             {data: 'autors.name', name: 'autors.autors_id'},
                             {data: 'cost', name: 'cost'}
                           ]
            });

            $('#albums').DataTable({
               "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No Existen Singles Registrados",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('AllSingles') }}",
                "columns": [
                             {data: 'song_name', name: 'song_name'},
                             {data: 'duration', name: 'duration'},
                             {data: 'autors.name', name: 'autors.autors_id'},
                             {data: 'cost', name: 'cost'}
                           ]
            });


  });
</script>
@endsection