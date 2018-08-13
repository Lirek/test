                        <form class="form-horizontal" role="form" method="POST" action="{{ url('api/login') }}">
                            {{ csrf_field() }}

                            
                                    <input id="email" type="email" class="form-control" name="email" autofocus>
                                    
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Olvide contraseña
                        </form>