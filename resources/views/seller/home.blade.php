@extends('seller.layouts')
@section('content')
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  <div class="row mtbox">
    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
      <div class="box1">
        <span class="li_music"></span>
        <h3>933</h3>
      </div>
      <p>933 People liked your page the last 24hs. Whoohoo!</p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
        <span class="li_tv"></span>
        <h3>+48</h3>
      </div>
      <p>48 New files were added in your cloud storage.</p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
        <span class="li_sound"></span>
        <h3>23</h3>
      </div>
      <p>You have 23 unread messages in your inbox.</p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
        <span class="li_video"></span>
        <h3>+10</h3>
      </div>
      <p>More than 10 news were added in your reader.</p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
      <div class="box1">
        <span class="li_vallet"></span>
        <h3>OK!</h3>
      </div>
      <p>Your server is working perfectly. Relax & enjoy.</p>
    </div>
  </div><!-- /row mt -->

  <div class="row mt">
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #DF7401;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Seguidores</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-flag-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class="info-box-number"> {{ $followers }} </i></h5>
          </div>
        </footer>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #8A084B;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Contenido Creado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-files-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class="info-box-number"> {{ $total_content }} </i></h5>
          </div>
        </footer>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #088A68;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Contenido Publicado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-star-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class="info-box-number"> {{ $aproved_content }} </i></h5>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #04B486;">
        <div class="darkblue-header">
          <h1>Ventas</h1>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class=""> 0</i></h5>
          </div>
        </footer>
      </div>
    </div>

    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #2ECCFA;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Balance de Tickets</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-tags fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class=""> 0</i></h5>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #FE2E2E;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Solicitudes Administrador</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-comments fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h5><i class=""> 0</i></h5>
          </div>
        </footer>
      </div>
    </div>
  </div>
    
@endsection
@section('js')
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
@endsection
