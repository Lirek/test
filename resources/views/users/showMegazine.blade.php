@extends('layouts.app')
@section('css')
    <style>

        .pdf{
            position:relative;
        }
        .transparencia {
            opacity: 0.1;
            display: inline-block;
            position:absolute;
            background-color: black;
            width:97%;
            height:99%;
        }
        .bloqueo{
            display: inline-block;
            position:absolute;
            background-color: black;
            width:97%;
            height:63px;
        }

        .aqua-gradient {
                           background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
                           background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
                           background: linear-gradient(40deg,#2096ff, #9dffac)!important;
                       }
    </style>
@endsection
@section('main')
    <!-- Main content -->
    <div class="row">

        <div class="col s12 m12" >
            @include('flash::message')
            <div class="card-panel curva" style="padding-bottom: 110px;">
                <div class="row">
                    <div class="col s12 m12">
                        <h4 class="titelgeneral"><i class="mdi mdi-book-open-page-variant"></i> {{ $megazines->title }}</h4>
                    </div>

                </div>
                <div class="row">
                    <div class="col s12 m4 ">
                        <img src="{{ asset($megazines->cover)}}" style="border-radius: 10px" id="lecturaspanel">
                    </div>
                    <div class="col s12 m8  ">
                        <ul class="collection z-depth-1" >

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                    <i class="material-icons circle left blue-text">star</i>
                                    <b class="left">Categoria:&nbsp;</b>
                                </p>
                                <p ALIGN="justify">{{ $megazines->rating->r_name }}</p>
                            </li>


                            @if($megazines->sagas !=null)
                                <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                    <p><i class="material-icons circle left blue-text">folder</i>
                                        <b class="left">Cadena de publicación:&nbsp;</b></p>
                                    <p ALIGN="justify">
                                        {{ $megazines->sagas->sag_name }}</p>
                                </li>
                            @else
                                <li class="collection-item" >
                                    <p><i class="material-icons circle left blue-text">folder</i>
                                        <b class="left">Cadena de publicación:&nbsp;</b></p>
                                    <p ALIGN="justify">Independiente</p>
                                </li>
                            @endif
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p><i class="material-icons circle left blue-text">turned_in</i>
                                    <b class="left">Géneros:</b> </p>
                                @foreach($megazines->tags_megazines as $t)
                                    <div class="chip  aqua-gradient  white-text">
                                        {{ $t->tags_name}}
                                    </div>

                                @endforeach
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p>
                                    <i class="material-icons circle left blue-text">local_play</i>
                                    <b class="left">Costo:&nbsp;</b>
                                </p>
                                <p ALIGN="justify">{{ $megazines->cost }} Tickets</p>
                            </li>

                            <li class="collection-item" style=" padding: 0px;" >
                                <br>
                            <div class="row">
                                @if($adquirido )
                                    <div class="col s4 m4 l4">
                                        <!-- <a  href="#modal-default" class="btn curvaBoton waves-effect waves-light teal center modal-trigger">Leer</a> -->
                                        <a  href="{{ asset($megazines->megazine_file) }}" class="btn curvaBoton waves-effect waves-light green" target="_blank">Leer revista</a>
                                    </div>
                                @else
                                    <div class=" col s4 m4 l4">
                                        <a class="btn curvaBoton waves-effect waves-light green" href="#" id="buyBook" onclick="fnOpenNormalDialog('{!!$megazines->cost!!}','{!!$megazines->title!!}','{!!$megazines->id!!}')"><i class="material-icons left   ">add_shopping_cart</i>Adquirir</a>
                                    </div>
                                @endif
                                <div class="col s4 m4 l4">
                                    <a class="waves-effect waves-light  center btn modal-trigger blue curvaBoton " href="#modal1">Descripción</a>
                                </div>
                                @if($adquirido )
                                    <a href="{{url('MyMegazine')}}" class="btn center curvaBoton red ">Atrás</a>
                                @else
                                    <a href="{{url('ReadingsBooks')}}" class="btn center curvaBoton red ">Atrás</a>
                                @endif
                            </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <!-- /.modal  de sagas  -->
    <div id="modal-default" class="modal modal-lg" >
        <div class="modal-content ">
            <div class=" blue"><br>
                <h4 class="center white-text" ><i class="small material-icons">book</i>"{{ $megazines->title }}"</h4>
                <br>
            </div>
            <br>
            <div class="pdf">
                <div class="transparencia"></div>
                <div class="bloqueo"></div>
                <object data="{{ asset($megazines->megazine_file) }}" class="text-center" style="width:100%;height:800px;" type="application/pdf"></object>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
    </div>


    <!--Sinopsis-->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Descripción:</b></h5>
            <p ALIGN="justify">{{ $megazines->descripcion }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>





@endsection
@section('js')

     <script>
//---------------------------------------------------------------------------------------------------
// Para evitar el click derecho sobre el modal del PDF        
        document.getElementById('modal-default').oncontextmenu = function() {
            return false
        }
        function right(e) {
        if (navigator.appName == 'Netscape' && e.which == 3) {
            return false;
        } else if (navigator.appName == 'Microsoft Internet Explorer' && event.button==2) {
            return false;
        }
            return true;
        }
        document.getElementById('modal-default').onmousedown = right;
// Para evitar el click derecho sobre el modal del PDF
//---------------------------------------------------------------------------------------------------
// Para visualizar el PDF

        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '//cdn.mozilla.net/pdfjs/tracemonkey.pdf';
        // The workerSrc property shall be specified.
        PDFJS.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';
        var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 0.8,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');
        /**
         * Get page info from document, resize canvas accordingly, and render page.
         * @param num Page number.
         */
        function renderPage(num) {
            pageRendering = true;
            // Using promise to fetch the page
            pdfDoc.getPage(num).then(function (page) {
                var viewport = page.getViewport(scale);
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                // Wait for rendering to finish
                renderTask.promise.then(function () {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        // New page rendering is pending
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            // Update page counters
            document.getElementById('page_num').textContent = num;
        }
        /**
         * If another page rendering in progress, waits until the rendering is
         * finised. Otherwise, executes rendering immediately.
         */
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }
        /**
         * Displays previous page.
         */
        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }
        document.getElementById('prev').addEventListener('click', onPrevPage);
        /**
         * Displays next page.
         */
         function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }
        document.getElementById('next').addEventListener('click', onNextPage);
        /**
         * Asynchronously downloads PDF.
         */
        PDFJS.getDocument(url).then(function (pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page_count').textContent = pdfDoc.numPages;

            // Initial/first page rendering
            renderPage(pageNum);
        });
// Para visualizar el PDF
//---------------------------------------------------------------------------------------------------
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function fnOpenNormalDialog(cost,name,id) {
  
   swal({
            title: "Estas seguro?",
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
                    
            url:'../BuyMagazines/'+id,
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
                
                      url     : '../MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                        swal('Revista comprada con exito','','success');
                         console.log(result);
                       window.setTimeout(function(){window.location.reload()}, 1000);
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