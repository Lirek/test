<style>

    .pagination li a {
        color: #444;
        display: inline-block;
        font-size: 1.2rem;
        padding: 0 10px;
        line-height: 30px;
    }
</style>


<?php if($paginator->hasPages()): ?>
    <ul class="pagination">



        
        <?php if($paginator->onFirstPage()): ?>
            <!--  disabled -->
            <li class="waves-effect disabled"><i class="material-icons">chevron_left</i></li>
        <?php else: ?>
            <li class="waves-effect"><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><i class="material-icons">chevron_left</i></a></li>
        <?php endif; ?>



        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <!--  disabled -->
                <li class="waves-effect disabled"><?php echo e($element); ?></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                            <li class="active blue"><a href="#!"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li class="waves-effect"><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="waves-effect"><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><i class="material-icons">chevron_right</i></a></li>
        <?php else: ?>
            <!--  disabled -->
            <li class="waves-effect disabled"><i class="material-icons">chevron_right</i></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
