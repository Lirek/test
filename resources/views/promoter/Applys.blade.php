@extends('promoter.layouts.app')


@section('content')                   

<main  class="mdl-layout__content">
 <div class="mdl-layout mdl-grid">
  <div class="mdl-grid">


   <div class="mdl-cell--4-col">
             <table class="mdl-data-table mdl-js-data-table ">            
                        <thead>
                                <tr>
                                  <th>Nombre Comercial</th>
                                  <th>Nombre Del Contacto</th>
                                  <th>Telefono Del Contacto</th>
                                  <th>Correo Del Contacto</th>
                                  <th>Solicitud</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($applys as $apply)
                                    <tr id="apply{{$apply->id}}">
                                      
                                      <td>{{$apply->name_c}}</td>
                                      
                                      <td>{{$apply->contact_s}}</td>
                                      
                                      <td>{{$apply->phone_s}}</td>
                                      
                                      <td>{{$apply->email_c}}</td>

                                      <td>
                                          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="ModifyApplys" value="{{$apply->id}}" data-toggle="modal" data-target="#myModal">
                                          {{$apply->status}}
                                        </button>
                                        
                                      </td>
                                      
                                      </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $applys->render() !!}

   </div>
  


 
  
  </div>
 </div>
</main>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique El Estatus De La Solicitud</p>
        

             <form method="POST"  id="formStatus">
                              {{ csrf_field() }}

             <div class="radio-inline">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button"  onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span class="mdl-radio__label">Aprobar</span>
                </label>
             </div>

             <div class="radio-inline">
             <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                <span class="mdl-radio__label">Negar</span>
             </label>

             </div>

             <div class="radio-inline" style="display:none" id="if_no">
              <div class="mdl-textfield mdl-js-textfield">
               <textarea name="message" class="mdl-textfield__input" type="text" rows= "6" id="razon" ></textarea>
               <label class="mdl-textfield__label" for="razon">Explique La Razon</label>
              </div>
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

$("#phone_s").intlTelInput();

function yesnoCheck() {
    if (document.getElementById('option-2').checked) 
    {
        $('#if_no').show();
    } 
    else 
    {
        $('#if_no').hide();
        $('#razon').val('');
    }
  };



$(document).on('click', '#ModifyApplys', function() {    
        var x = $(this).val();

            $(document).ready(function (e){
            $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var message=$('#razon').val();
                    var url = 'modify_applys/'+x;
                    console.log(s);
                    e.preventDefault();
                    $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                    message: message,
                                  }, 
                            success: function (result) {

                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        swal("Se ha "+s+" con exito","","success");
                                                        $('#album'+x).fadeOut();
                                                        },

                            error: function (result) {
                            swal('Existe un Error en su Solicitud','','error');
                            console.log(result);
                            }
                            });  
                                            });
                });

});

</script>

@endsection
                            

