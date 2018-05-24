@extends('seller.layouts')


@section('content')

    <section class="content-header" xmlns="">
        <h1>
            Libros
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-navy">
                        <div class="widget-user-image">
                            <img class="img-rounded img-responsive av"
                                 src="/images/authorbook/{{ $book->author->photo}}"
                                 style="width:70px;height:70px;" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $book->author->full_name }}</h3>
                        <h5 class="widget-user-desc">{{ $book->title }}</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li style="height: 90px">
                                <a href="#">Libro
                                    <span class="pull-right ">
                                        <img class="img-rounded img-responsive av"
                                             src="/images/bookcover/{{ $book->cover }}"
                                             style="width:70px;height:70px;" alt="User Avatar" data-toggle="modal"
                                             data-target="#modal-default">
                                    </span>
                                </a>
                                <br/>
                            </li>
                            <li>
                                <a href="#"> Titulo original
                                    <span class="pull-right ">
                                        {{ $book->original_title }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"> Categoria <span class="pull-right"> {{ $book->rating->r_name }} </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Saga <span class="pull-right ">{{ $book->saga->sag_name }}</span></a>
                            </li>
                            <li>
                                <a href="#">Sinopsis <span class="pull-right ">{{ $book->sinopsis }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- /.modal -->
        <div class="modal fade in modal-warning" id="modal-default">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">{{ $book->original_title }}</h4>
                    </div>
                    <div class="modal-body text-center ">
                        {{--<p>One fine body&hellip;</p>--}}
                        {{--inicio del ejemplo--}}

                        <embed src='/book/{{ $book->books_file }}' class="text-center" width="1200" height="750"
                               type='application/pdf'></embed>

                        {{--<h1>PDF.js Previous/Next example</h1>--}}


                        {{--fin del ejemplo--}}

                    </div>
                    {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default text-center" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    {{--</div>--}}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>

@endsection

@section('js')

    <script>
        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '//cdn.mozilla.net/pdfjs/tracemonkey.pdf';
        {{--var url = ' /book/{{ $book->books_file }}';--}}

        // The workerSrc property shall be specified.
        PDFJS.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';
                {{--PDFJS.workerSrc = ' /book/{{ $book->books_file }}';--}}

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
    </script>
    <script></script>

@endsection