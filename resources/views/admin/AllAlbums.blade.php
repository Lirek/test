@extends('admin.layouts.app')


@section('content')
<div class="mdl-layout mdl-grid">
    <div class="mdl-grid">
        <main  class="mdl-layout__content">
            <div class="mdl-cell mdl-cell--4-col">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <table class="mdl-data-table mdl-js-data-table ">            
                        <thead>
                                <tr>
                                  <th>Nombre Del Album</th>
                                  <th>Autor</th>
                                  <th>Duracion</th>
                                  <th>Proveedor</th>
                                  <th>Portada</th>
                                  <th>Resticcion de Edad</th>
                                  <th>Costo en Tickets</th>
                                  <th>Numero de Canciones</th>
                                  <th>Sumario</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($albums as $album)
                                    <?php $name=$album->Autors()->first(); ?>
                                    <tr id="album{{$album->id}}">                                
                                      <td>{{$album->name_alb}}</td>
                                      <td>{{$name['name']}}</td>
                                      <td>{{$album->duration}}</td>
                                      <td>{{$album->Seller()->first()->name}}</td>
                                      <td><img class=" img-circle " src="{{$album->cover}}"
                                                     style="width:50px;height:50px;" alt="Portada"></td>
                                      <td>{{$album->Rating()->first()->r_name}}</td>
                                      <td>{{$album->cost}}</td>
                                      <td> 
                                       <button id="songs" class="songs mdl-button mdl-js-button mdl-button--icon" value="{{$album->id}}">
                                        <i class="material-icons">library_music</i>
                                       </button>
                                        <span class="mdl-badge" data-badge="{{count($album->songs()->get())}}"></span>
                                      </td>
                                      
                                      <td>
                                        <a href="{{url('/SumaryAlbum/'.$album->id)}}">

                                        <button id="sumary" class="songs mdl-button mdl-js-button mdl-button--icon" value="{{$album->id}}">
                                        <i class="material-icons">ic_info</i>
                                        </button>  

                                        </a>
                                      </td>
                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="{{$album->id}}" data-toggle="modal" data-target="#myModal">
                                                        {{$album->status}}
                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $albums->render() !!}          
           
            </div>

            <div class="mdl-cell mdl-cell--1-col">
        
                <table id="song_table" class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--1-col">            
                        <thead>
                                <tr>
                                  
                                  <th>Nombre</th>
                                  <th>Duracion</th>
                                  <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody id="body_s">
                                
                            </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique el estatus del album</p>
        

             <form method="POST" id="formStatus">
                              {{ csrf_field() }}

             <div class="radio-inline">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="status" value="Aprobado">
                <span class="mdl-radio__label">Aprobar</span>
                </label>
             </div>

             <div class="radio-inline">
             <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="status" value="Denegado">
                <span class="mdl-radio__label">Negar</span>
             </label>

             </div>

             <div class="radio-inline">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
                </button>
            </div>

        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>



  
@endsection

@section('js')
<script>
        
        $(document).on('click', '.songs', function() {    
        var x = $(this).val();
        
            $.ajax({ 
                type    : "get",
                url     : "admin_songs/"+x,
                dataType: "json",
                
                success: function (data) 
                {
                    
                    var table = document.getElementById("song_table");
                    
                    $("#song_table").find("tr:gt(0)").remove();

                    
                    $.each(data, function( index, value ) 
                    {

                        var row = table.insertRow();
                        var name = row.insertCell();
                        var dur = row.insertCell();
                        var ar = row.insertCell();
                        name.innerHTML = value['song_name'];
                        dur.innerHTML = value['duration'];
                        ar.innerHTML = '<audio controls="" src="'+value['song_file']+'"><source src="'+value['song_file']+'" type="audio/mpeg"></audio>';

                    });

                    
                    
                      //console.log(data);          
                } 
                });

            });


    $(document).on('click', '#status', function() {    
        var x = $(this).val();

            $(document).ready(function (e){
            $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'admin_album/'+x;
                    console.log(s);
                    e.preventDefault();
                    $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                  }, 
                            success: function (result) {

                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        alert("Se ha "+s+" con exito");
                                                        $('#album'+x).fadeOut();
                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
                });

});

</script>

@endsection
                            
                                