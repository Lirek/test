@extends('promoter.layouts.app')


@section('main')                   

<h3><i class="fa fa-angle-right"></i>Solicitudes</h3>
          <div class="row mt">
            <div class="col-lg-12">
             <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i>Solicitudes de Cuenta Proveedor </h4>
                          <section id="unseen">

             <table class="table table-bordered table-striped table-condensed">            
                        <thead>
                                <tr>
                                  <th class="non-numeric">Nombre Comercial</th>
                                  <th class="non-numeric">Nombre Del Contacto</th>
                                  <th class="non-numeric">Telefono Del Contacto</th>
                                  <th class="non-numeric">Correo Del Contacto</th>
                                  <th class="non-numeric">Tipo Contenido</th>
                                  <th class="non-numeric">Vendedor</th>
                                  <th class="non-numeric">Solicitud</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($applys as $apply)
                                    <tr id="apply{{$apply->id}}">
                                      
                                      <td class="non-numeric">{{$apply->name_c}}</td>
                                      
                                      <td class="non-numeric">{{$apply->contact_s}}</td>
                                      
                                      <td class="non-numeric">{{$apply->phone_s}}</td>
                                      
                                      <td class="non-numeric">{{$apply->email}}</td>

                                      <td class="non-numeric">{{$apply->desired_m}}</td>

                                      <td class="non-numeric" id="apply_td{{$apply->id}}">
                                        @if($apply->salesman_id != NULL)
                                       <span class="mdl-chip mdl-chip--deletable" id="a_{{$apply->salesman_id}}_{{$apply->id}}">  <span class="mdl-chip__text" id="promoter_assing">{{$apply->Salesman->name}}</span> <button type="button" class="mdl-chip__action" value1="{{$apply->id}}" value2="{{$apply->salesman_id}}" name="apply" id="x"> <i class="material-icons">cancel</i> </button></span>
                                        @else

                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="add_promoter_to" value="{{$apply->id}}" data-toggle="modal" data-target="#AssingPromoter">
                                       <i class="material-icons">add</i>
                                        </button>
                                        @endif
                                      </td>
                                    
                                      <td class="non-numeric">
                                          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="ModifyApplys" value="{{$apply->id}}" data-toggle="modal" data-target="#myModal">
                                          {{$apply->status}}
                                        </button>
                                        
                                      </td>
                                      
                                      </tr>

                                    @endforeach
                               </tbody>
                       </table>
                       {!! $applys->render() !!}


                          </section>


               </div><!-- /content-panel -->
              </div><!-- /col-lg-4 -->     
           </div>



@include('promoter.modals.ApplysViewsModals')
@endsection

@section('js')
<script>

$( document ).ready(function() {
    


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
                          var url = 'AdminAproveOrDenialApplys/'+x;
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

      $(document).on('click', '#x', function() {
        
        var apply = $(this).attr('value1'); ;
        var promoter = $(this).attr('value2');;
        var url = 'delete_promoter_from/'+apply+'/'+promoter;

             $.ajax({
               url: url,
               type:'get',
               data:"json",

               success: function(data)
               {
                
                 swal("Se Ha Retirado el Promotor de la Solicitud con exito","","success");
                 var button = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="add_promoter_to" value="'+apply+'" data-toggle="modal" data-target="#AssingPromoter"><i class="material-icons">add</i> </button><div class="mdl-tooltip" data-mdl-for="add_promoter_to">Asignar Promotor para la <strong>Gestion</strong></div>';
                    $("#apply_td"+apply).prepend(button).hide().fadeIn();
                    $("#a_"+promoter+"_"+apply).fadeOut();
                    $("#a_"+promoter+"_"+apply).remove();
                
                                             

                                               
                                                   
                                                
               },

               error: function(data)
               {
                 alert("NO Permitido Por Favor Recargue la Pagina");
               },

             });
      });

      $(document).on('click', '#delete_applys', function() {
        var promoter = $(this).attr('value1'); 
        var apply = $(this).attr('value2');

       $.ajax({

                    url: 'delete_applys_from/'+promoter+'/'+apply,
                    type:'GET',
                    data: 'json',

                    success : function(data)
                    {
                      swal("Se Ha Retirado Con Exito La Solicitud","","success");
                      $("#p_"+promoter+"_"+apply).fadeOut();
                    },

                    error: function(data) 
                    {
                      swal('Error en Solicitud Por Favor Recargue la Pagina','','error');
                    }



                });

      });

      $(document).on('click', '#add_promoter_to', function() {

          var apply = $(this).val();
         
           $(document).ready(function (e){

             $( "#AssingPromoterForm" ).on( 'submit', function(e){

              var promoter = $("#sel1").val();
              var name = $( "#sel1 option:selected" ).text();
              var url_2 = 'AddSalesMan/'+apply;
              console.log(url_2);
              e.preventDefault();

               $.ajax({
                          url: url_2,
                          type:'post',
                          data:{
                                  _token: $('input[name=_token]').val(),
                                  promoter_n: promoter,
                          },                  

                            success: function(result){

                                swal('Promotor asignado con exito','','success');

                               var add = '<span class="mdl-chip mdl-chip--deletable" id="a_'+promoter+'_'+apply+'">  <span class="mdl-chip__text" id="promoter_assing">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+apply+'" value2="'+promoter+'" name="apply" id="x"> <i class="material-icons">cancel</i> </button></span>';
                               
                               var row =  $("#apply_td"+apply);

                               $("#add_promoter_to").fadeOut();
                               row.prepend(add);


                            },

                            error: function(result){

                              swal("NO Permitido Por Favor Recargue la Pagina","","error");
                            },
                      });


             });

           });
      });
});
</script>

@endsection
                            

