@extends('seller.layouts')
@section('content')
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  @include('flash::message')

<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
 <div class="container"> 
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s2"><a href="#musica"> musica</a></li>    
        <li class="tab col s2"><a href="#peliculas"> peliculas</a></li>
        <li class="tab col s2"><a href="#libros"> libros</a></li>
        <li class="tab col s2"><a href="#radios"> radios</a></li>
        <li class="tab col s2"><a href="#tv"> TV</a></li>        
      </ul>
    </div>
    <div class="col s12">
      <div id="musica" class="col s12" >musica musica</div>
      <div id="peliculas" class="col s12" >pelis pelis</div>
      <div id="libros" class="col s12" >libros libros</div>
      <div id="radios" class="col s12" >radios radios</div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  
  var instance = M.Tabs.init(el, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.tabs').tabs();
  });
     
</script>
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
@endsection
