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
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h2 class="widget-user-desc"><b>Libro:</b> "<?php echo e($book->title); ?>" (<?php echo e($book->release_year); ?>)</h2>
                <h2><b><?php echo e($book->cost); ?> tickets</b></h2>

                <div class="box box-widget widget-user-2">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">Leer libro</a>
                    </div>
                    <div id="panel" class="img-rounded img-responsive av text-center">
                    </div>
                    <h5> <b>Genero:</b> 
                        <?php $__currentLoopData = $book->tags_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span>| <?php echo e($t->tags_name); ?> |</span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h5>
                    <br>
                    <div class="box-footer no-padding">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="widget-user-header bg-navy">
                                <div class="widget-user-image">
                                    <img class="img-rounded img-responsive av"src="<?php echo e(asset('images/authorbook')); ?>/<?php echo e($book->author->photo); ?>" style="width:70px;height:70px;" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h2 class="widget-user-username"><b>Autor:</b> <?php echo e($book->author->full_name); ?></h2>
                            </div>
                            <ul class="nav nav-stacked">
                                <li>
                                    <h2>
                                        <b>Titulo original:</b>
                                        <span>
                                            "<?php echo e($book->original_title); ?>"
                                        </span>
                                    </h2>
                                </li>
                                <li>
                                    <h2><b>Sinopsis: </b>
                                        <span class="pull-right"></span>
                                    </h2>
                                    <h4 class="text-justify">
                                        <?php echo e($book->sinopsis); ?>

                                    </h4>
                                </li>
                                <li>
                                    <h2><b>Categoría:</b><span> <?php echo e($book->rating->r_name); ?> </span>
                                    </h2>
                                </li>
                                <li>
                                    <?php if($book->saga!=null): ?>
                                        <h2><b>Saga: </b><span><?php echo e($book->saga->sag_name); ?></span></h2>
                                        <div class="col-xs-4">
                                            <h3 class="pull-left"> <b>Antes:</b> <span> <?php echo e($book->before); ?> </span> </h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3 class="pull-left"> <b>Después:</b> <span> <?php echo e($book->after); ?> </span> </h3>
                                            <br>
                                        </div>
                                    <?php else: ?>
                                        <h2><b>Saga: </b><span>No tiene saga</span></h2>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12" align="center">
                        <a href="<?php echo e(url('/tbook')); ?>" class="btn btn-danger">Atrás</a>
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