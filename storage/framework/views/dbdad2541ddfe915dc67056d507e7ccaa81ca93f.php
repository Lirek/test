                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('api/login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            
                                    <input id="email" type="email" class="form-control" name="email" autofocus>
                                    
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>

                                    <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                                        Olvide contraseña
                        </form>