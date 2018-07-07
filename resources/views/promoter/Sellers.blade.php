@extends('promoter.layouts.app')

@section('main')

<h3><i class="fa fa-angle-right"></i>Proveedores Registrados</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Proveedores</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>Estatus</th>
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Ruc</th>
                                  <th>Descripcion</th>
                                  <th>Modulos</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($sellers as $seller)
                              <tr id="seller{{$seller->id}}">
                                                                      <td>                          
                                       <button id="ModifySellers" value="{{$seller->id}}" data-toggle="modal" data-target="#myModal">
                                          {{$seller->estatus}}
                                        </button>
                                      </td>
                                      <td>{{$seller->name}}</td>
                                      <td>{{$seller->email}}</td>
                                      <td>{{$seller->ruc}}</td>
                                      <td>{{$seller->descs_s}}</td>
                                      <td id="modules_td{{$seller->id}}">@foreach($seller->roles()->get() as $modules) 

                                  <span id="m_{{$modules->id}}_{{$seller->id}}">
                                  <span id="modules">{{$modules->name}}</span>
                                  <button type="button" 
                                  value1="{{$modules->id}}" value2="{{$seller->id}}" name="module" id="x"><i class="material-icons">cancel</i>
                                  </button>
                                  </span>
                                  @endforeach
                                    <button class="" data-toggle="modal" data-target="#ModalModules" value="{{$seller->id}}" id="add_module" @if($seller->estatus!= 'Aprobado') disabled @endif>
                                    <i class="material-icons">add</i>
                                    </button>
                                     </td>
                                  
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->

            <h3><i class="fa fa-angle-right"></i> Modulos de Contenido</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Modulos</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($acces_modules as $modules)
                                    <tr>
                                        <td>{{$modules->id}}</td>
                                        <td>{{$modules->name}}</td>
                                    </tr>
                                @endforeach
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->

@include('promoter.modals.SellersViewsModals')
@endsection

@section('js')
<script>
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
    $(document).on('click', '#x', function() {
      
      var module = $(this).attr('value1'); ;
      var seller = $(this).attr('value2');;
      var url = 'delete_mod/'+seller+'/'+module;
           $.ajax({
             url: url,
             type:'get',
             data:"json",

             success: function(data)
             {
               alert("Se Ha Retirado el Permiso del Modulo con exito");
               $("#m_"+module+"_"+seller).fadeOut();
             },

             error: function(data)
             {
               alert("NO Permitido Por Favor Recargue la Pagina");
             },

           });
    });


    $(document).on('click', '#add_module', function() {    

              var x = $(this).val();

        $(document).ready(function (e){

            $( "#AddModules" ).on( 'submit', function(e){
              
              var module = $("#sel1").val();
              var url = 'admin_add_module/'+x;
              
              var name = $( "#sel1 option:selected" ).text();
              var row = $("#modules_td"+x);
              var add = '<span class="mdl-chip mdl-chip--deletable" id="m_'+module+'_'+x+'">  <span class="mdl-chip__text" id="modules">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+module+'" value2="'+x+'" name="module" id="x"> <i class="material-icons">cancel</i> </button></span>';
              e.preventDefault();
                
                $.ajax({

                  url: url,
                  type:'POST',
                  data:{
                        _token: $('input[name=_token]').val(),
                        acces: module,
                        }, 

                        success: function (result) {
                          alert('Acceso Concedido Con Exito');
                         
                         row.prepend(add);   
                        },

                        error: function (result) 
                        {
                          alert('Error en Su solicitud Por Favor Recargue la Pagina');
                          console.log(result);
                        }

                });
              
            });
        });
    });

    $(document).on('click','#ModifySellers', function() {
      
      var x = $(this).val();
       console.log(x);
       $( "#FormStatusSeller" ).on( 'submit', function(e){

            var s=$("input[type='radio'][name=status]:checked").val();
            var message=$('#razon').val();
            var url = 'update_status_seller/'+x;

            e.preventDefault(); 
            
                                $.ajax({
                                url: url,
                                type: 'POST',
                                data: {
                                        _token: $('input[name=_token]').val(),
                                        status: s,
                                        message: message,
                                      }, 
                                success: function (result) {

                                                            $('#myModal').toggle();
                                                            $('.modal-backdrop').remove();
                                                            location.reload();
                                                            swal("Se ha "+s+" con exito","","success");
                                                            },

                                error: function (result) {
                                swal('Existe un Error en su Solicitud','','error');
                                
                                },
                                });  
                                  
                    
       });  


    });

</script>
@endsection