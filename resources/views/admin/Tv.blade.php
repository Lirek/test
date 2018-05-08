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
                                  <th>Logo</th>
                                  <th>Streaming</th>
                                  <th>Proveedor</th>
                                  <th>Redes Sociales</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($TVS as $tv)
                                    <tr id="tv{{$tv->id}}">
                                      <td>{{$tv->id}}</td>
                                      <td>{{$tv->r_name}}</td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="{{$tv->logo}}"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td>
                                        <audio controls="" src="{{$tv->streaming}}">
                                           <source src="{{$tv->streaming}}" type="video/quicktime">
                                      </audio>
                              </td>
                                      
                                      <td></td>
                                      <td>
                                       
                                        <a target="_blank" href="{{$tv->facebook}}">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-facebook"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="{{$tv->google}}">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-youtube"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="{{$tv->instagram}}">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-instagram"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="{{$tv->twitter}}">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-twitter"></i>
                                       </button>
                                       </a>

                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="{{$tv->id}}" data-toggle="modal" data-target="#myModal">
                                                        {{$tv->status}}
                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $TVS->render() !!}          
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
         <p>Modifique el estatus de la TV</p>
        

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
                    var url = 'admin_tv/'+x;
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
                                                        $('#tv'+x).fadeOut();
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
                            
                                