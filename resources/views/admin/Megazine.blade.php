@extends('admin.layouts.app')


@section('content')
<main  class="mdl-layout__content">
<div class="mdl-layout mdl-grid">
    <div class="mdl-grid">
        
            <div class="mdl-cell mdl-cell--1-col">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="mdl-data-table mdl-js-data-table ">            
                        <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Titulo</th>
                                  <th>Portada</th>
                                  <th>Restriccion</th>
                                  <th>Proveedor</th>
                                  <th>Descripcion</th>
                                  <th>Cadena de Publicacion</th>
                                  <th>Archivo</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($megazines as $megazine)
                                    <tr id="megazine{{$megazine->id}}">
                                      <td>{{$megazine->id}}</td>
                                      <td>{{$megazine->title}}</td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="{{$megazine->cover}}"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td>{{$megazine->Rating()->first()->r_name}}</td>
                                      
                                      <td>{{$megazine->Seller()->first()->name}}</td>
                                      
                                      <td>{{$megazine->descripcion}}</td>

                                      <td>
                                        @if($megazine->saga_id == 0 or $megazine->saga_id == 'NULL')
                                          <b>INDEPENDIENTE</b>

                                          @else

                                          {{$megazine->sagas()->first()->sag_name}}

                                          @endif
                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" data-toggle="modal" data-target="#file" value="{{$megazine->megazine_file}}" id="file_b">
                                        <i class="material-icons">insert_drive_file</i>
                                        </button>
                                    </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="{{$megazine->id}}" data-toggle="modal" data-target="#myModal">
                                                        {{$megazine->status}}
                                        </button>
                                          
                                    


                                        </td>
                                    </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $megazines->render() !!}          
            </div>

        
    </div>
</div>
</main>
<div class="modal fade" id="file" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revista</h4>
        </div>
        <div class="modal-body">
         
        <embed id="megazine_file" src="" width="500" height="375" type='application/pdf'>

        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
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
         <p>Modifique el estatus de la Revista</p>
        

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
        

    $(document).on('click', '#status', function() {    
        var x = $(this).val();

            $(document).ready(function (e){
            $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'admin_megazine/'+x;

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
                                                        $('#megazine'+x).fadeOut();
                                                        

                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
                });

});

    $(document).on('click', '#file_b', function() {
       var x = $(this).val();
       console.log(x);
       $("#megazine_file").attr("src", x);
    });    



</script>

@endsection
                            
                                