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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 40px">
            <div class="panel panel-success">
                <div class="panel-heading">Restablecer Contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Enviar Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
