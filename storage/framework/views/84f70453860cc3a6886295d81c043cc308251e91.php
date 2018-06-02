  <!DOCTYPE html>
  <html>
    <head>
      <!--Los iconitos de  Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--EL materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

       <link rel="stylesheet" href="<?php echo e(asset('sistem_images/MaterialAdmin.css')); ?>">
      <!--Escala del navegador-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

<nav>
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i>
      </a>
      <a href="<?php echo e(url('/home')); ?>" class="brand-logo center"><img src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>" class="img-responsive" style="width:35%;"></a>
       <ul class="right hide">
      <?php if(Auth::guest()): ?>      
            <li><a href="/login">Iniciar Sesion</a></li>
            <li><a href="">Registrarse</a></li>
      <?php endif; ?>
        </ul>
      <ul class="side-nav" id="mobile-demo">
        
        <div class="row">
          <div class="col s12">
            <img src="https://gravatar.com/avatar/961997eb7fd5c22b3e12fb3c8ca14e11?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" class="circle responsive-img profile-pic">
            <p style="font-size: 20px; position: relative; margin-left: 40px"> Jesus Ovalles</p>
          </div>
        </div>
        
        <div class="row user-acctions">
          
          <div class="col s2">
            <a class="waves-effect waves-light btn-floating bnt btn-small transparent"><i class="material-icons left">perm_identity</i>Mi Perfil</a>
          </div>

          <div class="col s2" style="margin-left: 5px; ">
            <a class="waves-effect waves-light btn-floating btn-small transparent"><i class="material-icons left">settings</i>Mis Transferencias</a>
          </div>

          <div class="col s2" style="margin-left: 5px">
            <a class="waves-effect waves-light btn-floating btn-small transparent"><i class="material-icons left">power_settings_new</i>Cerrar Sesion</a>
          </div>
        </div>

        <div class="row">
              <li>
              <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">queue_music</i>Mi Musica</a>
              </li>
        </div>

        <div class="row">
        
          <li>
            <ul class="collapsible collapsible-accordion">
               <li>
                  <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">library_books</i>Mis Lecturas <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                   <div class="collapsible-body">
                     <ul>
                       <li>
                          <a class="waves-effect waves-blue" href="#"><i class="material-icons">collections_bookmark</i>Libros</a>
                       </li>
                     <li>
                        <a class="waves-effect waves-blue" href="#"><i class="material-icons">picture_as_pdf</i>Revistas
                        </a>
                    </li>
                   </ul>
              </div>
            </li>
          </ul>
        </li>
        </div>

        <div class="row">
          <li>
            <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">ondemand_video</i>Mis Series</a>
          </li>
        </div>
        
        <div class="row">
          <li>
            <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">theaters</i>Mis Peliculas</a>
          </li>
        </div>

        <div>
                    <li>
            <ul class="collapsible collapsible-accordion">
               <li>
                  <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">view_stream</i>Mis Streams <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                   <div class="collapsible-body">
                     <ul>
                       <li>
                          <a class="waves-effect waves-blue" href="#"><i class="material-icons">radio</i>Radios</a>
                       </li>
                     <li>
                        <a class="waves-effect waves-blue" href="#"><i class="material-icons">tv</i>Tvs
                        </a>
                    </li>
                   </ul>
              </div>
            </li>
          </ul>
        </li>
        </div>

    </div>
  </nav>


  <div class="container">
    
    <div class = "row">
         <div class = "col s12 m6">
            <div class = "card blue-grey lighten-4">
               <div class = "card-content">
                  <span class = "card-title"><h3>Learn HTML5</h3></span>
                  <p>HTML5 is the next major revision of the HTML standard superseding
                     HTML 4.01, XHTML 1.0, and XHTML 1.1. HTML5 is a standard for
                     structuring and presenting content on the World Wide Web.</p>
               </div>
               
               <div class = "card-action">
                  <button class = "btn waves-effect waves-light blue-grey">
                     <i class = "material-icons">share</i></button>
                  <a class = "right blue-grey-text" href = "http://www.tutorialspoint.com">
                     www.tutorialspoint.com</a>
               </div>
            </div>
         </div>
         
         <div class = "col s12 m6">
            <div class = "card blue-grey lighten-4">
               <div class = "card-image">
                  <img src = "html5-mini-logo.jpg">                
               </div>
               
               <div class = "card-content">                  
                  <p>HTML5 is the next major revision of the HTML standard superseding
                     HTML 4.01, XHTML 1.0, and XHTML 1.1. HTML5 is a standard for
                     structuring and presenting content on the World Wide Web.</p>
               </div>
               
               <div class = "card-action">
                  <button class = "btn waves-effect waves-light blue-grey">
                     <i class = "material-icons">share</i></button>
                  <a class = "right blue-grey-text" href = "http://www.tutorialspoint.com">
                     www.tutorialspoint.com</a>
               </div>
            </div>
         </div>
      </div>
      
      <div class = "row">
         <div class = "col s12 m6">
            <div class = "card blue-grey lighten-4">
               <div class = "card-image waves-effect waves-block waves-light">
                  <img class = "activator" src = "html5-mini-logo.jpg">                
               </div>
               
               <div class = "card-content activator">                  
                  <p>Click the image to reveal more information.</p>
               </div>
               
               <div class = "card-reveal">
                  <span class = "card-title grey-text text-darken-4">HTML5
                     <i class = "material-icons right">close</i></span>
                  <p>HTML5 is the next major revision of the HTML standard superseding
                     HTML 4.01, XHTML 1.0, and XHTML 1.1. HTML5 is a standard for
                     structuring and presenting content on the World Wide Web.</p>
               </div>
               
               <div class = "card-action">
                  <button class = "btn waves-effect waves-light blue-grey">
                     <i class = "material-icons">share</i></button>
                  <a class = "right blue-grey-text" href = "http://www.tutorialspoint.com">
                     www.tutorialspoint.com</a>
               </div>
            </div>
         </div>
      </div>
      
         




  </div>







      <!--Librerias Js en Cdn-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
<script>
       $(document).ready(function(){
            $('.button-collapse').sideNav({
                menuWidth: 250, 
                edge: 'left',
                closeOnClick: false,
                draggable: true 
              });

              $('.button-collapse').sideNav('show');

                                });
</script>

<footer class="page-footer">

  © 2018 Leipel
               
            

</footer>
    </body>

  </html>