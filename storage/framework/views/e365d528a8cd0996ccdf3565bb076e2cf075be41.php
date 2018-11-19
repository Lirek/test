<?php $__env->startSection('css'); ?>
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($book->cover); ?>");
            margin-top: 5%;
            background-position: center center;
            width: 100%;
            min-height: 500px;
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
        .colorbadge{
            background-color:#428bca;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

        <div class="row" >

            <div class=" col-sm-12 col-md-6">
                <div class="row">
                    <div class=" col-sm-12 col-md-4 col-lg-4"></div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div id="panel" class="img-rounded img-responsive av text-center"></div>
                    </div>
                </div>
            </div><!-- /. col img book -->

            <div class="col-sm-12 col-md-6">
                <div class="col-sm-12 col-md-8">
                    <h3>Libro | "<?php echo e($book->title); ?>" (<?php echo e($book->release_year); ?>)</h3>
                    <h4><b><?php echo e($book->cost); ?> tickets</b></h4>
                </div><!-- /. col titel book -->
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <hr>
                        <h5> <b>Sinopsis:</b></h5>
                        <p class="text-justify"><?php echo e($book->sinopsis); ?></p>
                        <h5><b>Titulo original: </b><span><?php echo e($book->original_title); ?></span></h5>

                    <!-- / <div class="widget-user-image">
                            <img class="img-rounded img-responsive av"src=" //asset('images/authorbook') //$book->author->photo " style="width:70px;height:70px;" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image
                        <h2 class="widget-user-username"><b>Autor:</b>  //$book->author->full_name </h2>
                        -->

                        <h5> <b>Géneros:</b>
                            <?php $__currentLoopData = $book->tags_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge badge-light colorbadge"> <?php echo e($t->tags_name); ?> </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h5>
                        <h5> <b>Categoria:</b> <span class="label label-success"> <?php echo e($book->rating->r_name); ?> </span></h5>

                        <div class="row">
                            <?php if($book->saga!=null): ?>

                                <div class="col-md-12">
                                    <h5><b>Saga: </b><span><?php echo e($book->saga->sag_name); ?></span></h5>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <h5 class="pull-left"> <b>Antes:</b> <span> <?php echo e($book->before); ?> </span> </h5>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <h5 class="pull-left"> <b>Después:</b> <span> <?php echo e($book->after); ?> </span> </h5>
                                    <br>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <h5><b>Saga: </b><span>No tiene saga</span></h5>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div  class="col-md-12" >
                                <hr>
                            </div>
                            <div  class="col-md-6" >
                                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">Leer libro</a>
                            </div>
                            <div  class="col-md-6">
                                <a href="<?php echo e(url('/tbook')); ?>" class="btn btn-danger">Atrás</a>
                            </div>
                        </div>
                    </div> <!-- /. col contenido book -->

                </div>
            </div>
        </div> <!-- /. row contenido book -->




        <!-- /.modal -->
        <div class="modal fade in modal-warning" id="modal-default">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center"><?php echo e($book->title); ?></h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="pdf">

                            <div class="transparencia"></div>
                            <div class="bloqueo"></div>
                            <object data="<?php echo e(asset('book')); ?>/<?php echo e($book->books_file); ?>" class="text-center" style="width:80%;height:800px;" type="application/pdf"></object>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-center" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
         * @param  num Page number.
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>