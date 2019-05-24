<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Leipel</title>
                <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet"
              href="{{ asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.css') }}">
        {{--<link href="/css/app.css" rel="stylesheet">--}}
        <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
        
    </head>

    
    <body>

        @if ($error)
        <center>
            <div class="alert alert-danger">{{ $error }}</div>
        </center>
        @endif

        <img src="{{ asset('sistem_images/unautorized.jpg') }}" style="height: 100%; max-width: 100%; display: block;
    margin-left: auto;
    margin-right: auto;">

    </body>

</html>