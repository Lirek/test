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
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Imagen</th>
                                  <th>Restriccion</th>
                                  <th>Proveedor</th>
                                  <th>Descripcion</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($sagas as $saga)
                                    <tr id="saga{{$saga->id}}">
                                      <td>{{$saga->id}}</td>
                                      <td>{{$saga->sag_name}}</td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="{{$saga->img_saga}}"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td>{{$saga->Rating()->first()->r_name}}</td>
                                      
                                      <td>{{$saga->Seller()->first()->name}}</td>
                                      <td>
                                        {{$saga->sag_description}}
                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="{{$saga->id}}" data-toggle="modal" data-target="#myModal">
                                                        {{$saga->status}}
                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $sagas->render() !!}          
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
         <p>Modifique el estatus de la Cadena de Publicacion</p>
        

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
                    var url = 'admin_chain/'+x;

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
                                                        $('#saga'+x).fadeOut();
                                                        

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
                            
                                