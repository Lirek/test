@extends('promoter.layouts.app')
@section('css')

    <style>

      .curvaBoton{border-radius: 20px;}  
      
        #truncate {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
    
@endsection
@section('main')
<span class="card-title grey-text"><h3>Producto destacado</h3></span>

        @if($beneficio != "")
          @foreach($beneficio as $bene)
           <div  class="col m3 s12 ">
              <div class="card medium">
                <div class="card-image">
                  <div class="slider">
                    <ul class="slides">    
                      @for ($i=0; $i < count($bene->saveImg); $i++) 
                        <li>
                          <img src="{{ asset($bene->saveImg[$i]->imagen_prod) }}" style="height: 60%">
                        </li>
                      @endfor
                    </ul>
                  </div>
                  <div class="card-action s12">
                  <a class="btn-floating blue darken-1" style="float: right; position: relative; z-index:70;" href="{{asset($bene->pdf_prod)}}" target="_blank" ><i class="material-icons left">info_outline</i></a>
                </div>
                </div>
                  <div class="card-content s12">
                      <b ><h6 id="truncate" class="truncate" >{{$bene->name}}</h6></b>
                      <b><small>Stock: {{$bene->amount}} </small></b>
                      <br>
                      <br>
                      @if($bene->tipo != 1)
                      <a id="ajuste" value="{{ $bene->id }}" class="btn-small waves-effect waves-light btn curvaBoton" ><i class="material-icons left">assignment_turned_in</i>Destacar</a>
                      @else
                      <a class="waves-effect waves-light btn curvaBoton modal-trigger disabled"><i class="material-icons left">assignment_turned_in</i>Actual</a>
                      @endif
                      <br>
                  </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="col s12">
              <br><br>
              <blockquote >
                  <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>En este momento no tenemos promociones disponibles.</h5>
              </blockquote>
          </div>
        </div><!--End div row -->
        @endif

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slider();
    });

    $(document).on('click', '#ajuste', function() {
            var id = $(this).attr("value");
            console.log(id);
            swal({
                title: "¿Desea realmente destacar este producto?",
                icon: "warning",
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
                    var gif = "{{ asset('/sistem_images/loading.gif') }}";
                    swal({
                        title: "Procesando la información",
                        text: "Espere mientras se procesa la información.",
                        icon: gif,
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                    $.ajax({
                        url : "{{url('ajuste/')}}/"+id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            swal('Producto destacado exitosamente','','success')
                            .then((recarga) => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            swal('Existe un error en su solicitud','','error')
                            .then((recarga) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
</script>
@endsection