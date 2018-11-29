<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo e(route('log-viewer::dashboard')); ?>" class="navbar-brand">
                <i class="fa fa-fw fa-book"></i> Errores Leipel
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="<?php echo e(url('promoter_home') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('promoter_home')); ?>">
                        <i class="fa fa-dashboard"></i> Panel Principal
                    </a>
                </li>
                <li class="<?php echo e(Route::is('log-viewer::logs.list') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('log-viewer::logs.list')); ?>">
                        <i class="fa fa-archive"></i> Logs
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>