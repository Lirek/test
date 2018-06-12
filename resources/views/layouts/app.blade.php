<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link href="{{ asset('plugins/flag-icon-css-master/css/flag-icon.css') }}" rel="stylesheet">
<style type="text/css">
      
        #image-preview 
        {
  width: 280px;
  height: 400px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
        }
        
        #image-preview input 
        {
  line-height: 200px;
  font-size: 200px;
  position: absolute;
  opacity: 0;
  z-index: 10;
        }

        #image-preview label 
        {
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #bdc3c7;
  width: 200px;
  height: 50px;
  font-size: 20px;
  line-height: 50px;
  text-transform: uppercase;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
        }
 
        * {
          box-sizing: border-box;
          }

 
  main
  {
    flex: 1 0 auto;

  }
  header
        {
        min-height: 100vh;
        }

  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    background: linear-gradient(to bottom right, #22bded, #3871b9);
}

  

  @media only screen and (max-width: 992px) {
    header,
    main,
    footer {
      padding-left: 0;
    }
  }

  #credits li,
  #credits li a {
    color: white;
  }

  #credits li a {
    font-weight: bold;
  }

  .footer-copyright .container,
  .footer-copyright .container a {
    color: #BCC2E2;
  }

  .fab-tip {
    position: fixed;
    right: 85px;
    padding: 0px 0.5rem;
    text-align: right;
    background-color: #323232;
    border-radius: 2px;
    color: #FFF;
    width: auto;
  }
</style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>



<body>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
    @include('layouts.partials.sidebar')
    
    @include('layouts.partials.navbar')
  
    <main>
      @include('layouts.partials.buttom')
     @yield('main')

       
    </main>
    
 @yield('footer')
      <footer class="blue-grey page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h5 class="white-text">Leipel</h5>
          <ul id='credits'>
            <li>
              Disfrute del mejor contenido digital al alcanze de sus manos dentro de nuestra plataforma 
            </li>
            <li>
              <a href="https://material.io/icons/">Terminos y Condiciones del Servicio </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <span>Leipel 2018</span>
      </div>
    </div>
  </footer>

 
</body>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  


  <script type="text/javascript">
    $(document).ready(function() {
      $('.button-collapse').sideNav();
    $('.collapsible').collapsible();
    $('select').material_select();
    });
  </script>
  @yield('js')
