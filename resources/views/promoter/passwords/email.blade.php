<style>

.logueo {/* PARALLAX */
    height: 100%!important;
    width: 100%!important;
}

.login {
    border: 1px solid #FFF;
    width: 60%;
    margin: 0 auto;
    background-color: rgba(255,255,255,.7);
    padding: 20px;
}


.curvaBoton {
    border-radius: 20px;
}
</style>
<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>LEIPEL</title>
  </head>
  <body>
  <div class="had-container">
       <div class="parallax-container logueo">
        <div class="parallax"><img src="{{asset('sistem_images/promoter_assing.png')}}"></div>
        <div class="row"><br>
          <div class="col m8 s8 offset-m2 offset-s2 center">              
            <div class="row login">
              <img src="{{asset('sistem_images/Leipel.png')}}" width="200px" alt="" class="circle responsive-img">
              <h4>Restablecer contraseña</h4>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
              <form class="form-login" method="POST" action="{{ url('/promoter_password/email') }}">
                {{ csrf_field() }}
                <div class="row">
                   <div class="input-field col m12 s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="text" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    <label for="icon_prefix">Correo</label>
                    <div class="row">
                    <div class="input-field col s12 center">
                    <button class="btn curvaBoton waves-effect waves-light green" type="submit" >Enviar
                        <i class="material-icons right">send</i>
                    </button>
                    </div>
                </div>
                  </div>
                </div>
              </form>
            </div>
            </h4>
          </div>
        </div>
      </div>
    </div>
    

    </div> <!-- fin del .container -->


    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
          $('.parallax').parallax();
      });
</script>