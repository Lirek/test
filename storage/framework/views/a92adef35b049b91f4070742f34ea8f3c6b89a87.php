<?php $__env->startSection('css'); ?>
    <style>

       .contenedor{
        position:absolute;
    }
    .pdf{
        position:relative;
    }
    .bloqueo{
        position:relative;
        background-color:rgba(255,255,255,0.00);
        width:70%;
        height:780px;
    }
        .transparencia {
            opacity: 0.1;
            display: inline-block;
            position:absolute;
            background-color: black;
            width:97%;
            height:99%;
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

        .aqua-gradient {
            background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
            background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
            background: linear-gradient(40deg,#2096ff, #9dffac)!important;
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <!-- Main content -->
    <div class="col s12 m12 l12">


                              <div class="pdf">
                                 <embed class="col s12 m12 l12" src="<?php echo e(asset('book')); ?>/<?php echo e($book->books_file); ?>#zoom=100&toolbar=0&navpanes=0;" type="application/pdf" width="100%" height="800px" />

                                <!--<object class="col s12 m12 l12" data="<?php echo e(asset('book')); ?>/<?php echo e($book->books_file); ?>#zoom=100&toolbar=0" type="application/PDF" width="100%" height="800px" align="right"></object>-->
                                      
                                                    </div>
                                                    <div class="bloqueo">
                                      </div>
                              </div>

    <!--Modal-->
    <!-- /.modal  de sagas  -->
  
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script type="text/javascript">
$(document).ready(function(){
document.oncontextmenu = function(){return false;}
});
</script>

  <!--<script>
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
    </script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>