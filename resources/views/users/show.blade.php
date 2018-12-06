@extends('layouts.app')
@section('css')
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("{{ asset('images/bookcover/') }}/{{$book->cover}}");
            margin-top: 2%;
            background-position: center center;
            width: 100%;
            min-height: 350px;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .pdf{
            position:relative;
        }
        .transparencia {
            opacity: 0.1;
            display: inline-block;
            position:absolute;
            background-color: black;
            width:79%;
            height:99%;
        }
        .bloqueo{
            display: inline-block;
            position:absolute;
            background-color: black;
            width:80%;
            height:33px;
        }

        .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle {
            position: absolute;
            width: 42px;
            height: 42px;
            overflow: hidden;
            left: 35px;
            display: inline-block;
            vertical-align: middle;
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
                <div class="col s12 m8 offset-m1">
                <h5  class="center">
                    "{{ $book->title }}" ({{ $book->release_year }})
                </h5>
                </div>
                <div class="col s12 m2">
                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton center" href="#modal1">Sinopsis</a>
                </div>
</div>
                <div class="row">
                    <div class="col s12 m3 offset-m1 ">
                        <img style="border-radius: 10px" id="panel">
                        <br><br>
                        <div class="col s12 m12 ">
                            <div class="col s12 m6 ">
                        <a href="#" class="btn  curvaBoton" data-toggle="modal" data-target="#modal-default">Leer libros</a>
                            </div>
                                <div class="col s12 m6 ">
                                <a href="{{url('MyReads')}}" class="btn curvaBoton red ">Atrás</a>
                                </div>
                        </div>
                    </div>
                    <div class="col s12 m7  ">
                        <ul class="collection z-depth-1" >
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                <i class="material-icons circle left blue-text">create</i>
                                    <b class="left">Titulo original: </b>
                                </p>
                                <p ALIGN="justify">&nbsp; {{ $book->original_title }}</p>
                            </li>
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                        <p><i class="material-icons circle left blue-text">turned_in</i>
                                        <b class="left">Géneros:&nbsp;</b></p>
                                        <p ALIGN="justify">
                                        @foreach($book->tags_book as $t)
                                          {{ $t->tags_name }}
                                        @if(count($book->tags_book)>1)
                                            &nbsp;/
                                        @endif
                                        @endforeach
                                        </p>
                            </li>


                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <div class="row">
                                <div class="col s6 m6 ">
                                    <p><i class="material-icons circle  blue-text">star</i>
                                    <b class="left">Categoria:&nbsp;&nbsp;</b>{{ $book->rating->r_name }}</p>
                                </div>
                                <div class="col s6 m6 ">
                                    <p><i class="material-icons circle  blue-text">local_play</i>
                                        <b class="left">Costo:&nbsp;&nbsp;</b>
                                        {{ $book->cost }} Tickets
                                    </p>
                                </div>

                            </div>
                            </li>


                            @if($book->saga!=null)
                                <li class="collection-item"  style="padding: 5px 35px 5px 35px;">
                                            <p><i class="material-icons circle left blue-text">folder</i>
                                            <b class="left">Saga:&nbsp;</b></p>
                                    <p ALIGN="justify">
                                            {{ $book->saga->sag_name }}</p>
                                </li>
                            @else
                                <li class="collection-item" style="padding: 5px 35px 5px 35px;">

                                            <p><i class="material-icons circle left blue-text">folder</i>
                                            <b class="left">Saga:&nbsp;</b></p>
                                    <p ALIGN="justify">
                                            No pertenece a una saga</p>
                                </li>
                            @endif

                            {{--<li class="collection-item avatar">--}}
                                {{--<img  src="{{ asset('images/authorbook') }}/{{$book->author->photo }}"  alt="User Avatar"class="circle img-responsive">--}}
                                {{--<span class="title"><b>Autor:</b></span>--}}
                                {{--<p><a href="{{url('ProfileBookAuthor')}}/{{$book->id}}">{{ $book->author->full_name }}</a></p>--}}
                            {{--</li>--}}


                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <!-- /.modal  de sagas  -->
    <div id="modal-default" class="modal" style="width:100%;height:100%;">
        <div class="modal-content modal-lg">
            <div class=" blue"><br>
                <h4 class="center white-text" ><i class="small material-icons">book</i>"{{ $book->title }}"</h4>
                <br>
            </div>
            <br>
            <div class="pdf">
                <div class="transparencia"></div>
                <div class="bloqueo"></div>
                <object data="{{ asset('book')}}/{{ $book->books_file }}" class="text-center" style="width:100%;height:800px;" type="application/pdf"></object>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
    </div>

    <!--Sinopsis-->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Sinopsis:</b></h5>
            <p ALIGN="justify">{{ $book->sinopsis }}</p>
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

@endsection