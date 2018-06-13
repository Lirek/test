<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leipel</title>
    <link rel="stylesheet" href="{{ asset('plugins/bubbles/movingbubbles.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.css') }}">
          {{--<link href="/css/app.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <script src="{{ asset('plugins/bubbles/movingbubbles.js') }}" type="text/javascript"></script>
</head>

<body>
@include('flash::message')
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
        <div class="thumbnail">
            <img src="{{ asset('sistem_images/Logo-Leipel.png') }}" alt="242x200">
                <div class="caption">
                    <h2  align="center">Ingresar</h2>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form role="form" method="POST" action="{{ url('/seller_login') }}">
                    {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Correo</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Contraseña</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div align="center">
                                <button type="submit" class="btn btn-success">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="{{ url('/seller_password/reset') }}">
                                    Olvido su Contraseña                                </a>
                            </div>
                        </div>

                    </form>
                
                </div>
        </div>
    </div>
</div>
<div align="center">
<a href="{{url('/applys')}}" >
<button class="btn btn-info">
                                    Solicitar Cuenta 
                                            de
                                        Proveedor
</button>
</a>
</body>
</html>
