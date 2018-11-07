@extends('layouts.app')
@section('css')
<style class="cp-pen-styles">
    @import url("https://fonts.googleapis.com/css?family=Arimo:400,700");
    * {
      -webkit-transition: 300ms;
      transition: 300ms;
    }

    /*.btn-circle {*/
      /*width: 30px;*/
      /*height: 30px;*/
      /*text-align: center;*/
      /*padding: 6px 0;*/
      /*font-size: 12px;*/
      /*line-height: 1.428571429;*/
      /*border-radius: 15px;*/
    /*}*/
    /*.btn-circle.btn-lg {*/
      /*width: 50px;*/
      /*height: 50px;*/
      /*padding: 10px 16px;*/
      /*font-size: 18px;*/
      /*line-height: 1.33;*/
      /*border-radius: 25px;*/
    /*}*/
    /*.btn-circle.btn-xl {*/
      /*width: 70px;*/
      /*height: 70px;*/
      /*padding: 10px 16px;*/
      /*font-size: 24px;*/
      /*line-height: 1.33;*/
      /*border-radius: 35px;*/
    /*}*/


    ul {
      list-style-type: none;
    }

    h1, h2, h3, h4, h5, p {
      font-weight: 400;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    a:hover {
      color: #6ABCEA;
    }

    .movie-card {
      background: #ffffff;
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 315px;
      margin: 2em;
      border-radius: 10px;
      display: inline-block;
    }

    .movie-header {
      padding: 0;
      margin: 0;
      height: 100%;
      width: 100%;
      display: block;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .header-icon-container {
      position: relative;
    }

    .movie-card:hover {
      -webkit-transform: scale(1.03);
      transform: scale(1.03);
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
    }

    .movie-content {
      padding: 18px 18px 24px 18px;
      margin: 0;
    }

    .movie-content-header, .movie-info {
      display: table;
      width: 100%;
    }

    .movie-title {
      font-size: 15px;
      margin: 0;
      display: table-cell;
      word-break: break-all;
    }

    .info-section label {
      display: block;
      color: rgba(0, 0, 0, 0.5);
      margin-bottom: .5em;
      font-size: 9px;
    }

    .info-section span {
      font-weight: 700;
      font-size: 11px;
    }

    @media screen and (max-width: 500px) {
      .movie-card {
        width: 100%;
        max-width: 100%;
        margin: 1em;
        display: block;
      }
    }
  </style>
@endsection

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mis Libros</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <!-- <input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    <button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar...</button> -->
                    <hr>
                </div>
                </div>
                 @if($Books != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Books as $Book)
                <div class="col-lg-3 col-md-3 col-sm-3 mb">
                    <div class="movie-card" style="  border-radius: 10px;">
                        <div id="movie-header" style="">
                          <a href="{{url('ShowMyReadBook/'.$Book->id)}}">
                            @if($Book->cover)
                                <img src="images/bookcover/{{$Book->cover}}" width="100%" height="220" style="">

                            @else
                                <img src="#" width="100%" height="220" style="">
                            @endif
                          </a>
                        </div>
                        <!-- <div class="profile-01 centered">
                            <p><a href="{{url('ShowMyReadBook/'.$Book->id)}}" style="color: #ffff">Ver mas</p></a>
                        </div> -->
                        <div class="movie-content">
                            <center><a href="{{url('ShowMyReadBook/'.$Book->id)}}" style="color: "><h4>{{$Book->title}}</h4></a></center>
                            <h6><b>Autor:</b><a href="ProfileBookAuthor/{{$Book->id}}">{{$Book->author->full_name}}</a></h6>
                            <h6 class="sinopsis"><b>Sinopsis:</b>{{$Book->sinopsis}}
                            </h6>
                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                @endforeach
                @else
                    <h1>No Posee Libros adquiridos</h1>
                @endif
            </div>
        </div> 
    </div> 
</div> 

@endsection


@section('js')

<script type="text/javascript">

$(document).ready(function(){
  $('#seach').keyup(function(evento){
    $('#buscar').attr('disabled',true);
  });
  $('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
        source: "SearchAuthor",
        minLength: 2,
        select: function(event, ui){    
          $('#seach').val(ui.item.value);
          var valor = ui.item.value;
          console.log(ui.item.type);
          if (valor=='No se encuentra...'){
            $('#buscar').attr('disabled',true);
            swal('Autor no se encuentra regitrado','','error');
          }else{
            $('#buscar').attr('disabled',false);
          }
        }

   });
  });
</script>
<script>
   $(document).ready(function() {
      var showChar = 100;
      var ellipsestext = "...";
      var moretext = "Seguir leyendo >";
      var lesstext = "Mostrar menos";       
      var content = $('.sinopsis').html();
      
      if(content.length > showChar) {
         var c = content.substr(0, showChar);
         var html = '<div class="abstract">' + c + ellipsestext + '</div>' + '<div class="morecontent">' + content + '</div>' + '<p><span class="morelink">' + moretext + '</span></p>';
          $('.sinopsis').html(html);
       }
         
       $('.morelink').click(function() {
          if($(this).hasClass('less')) {
             $(this).removeClass('less');
             $(this).html(moretext);
             $('.abstract').removeClass('hidden');
           } else {
             $(this).addClass('less');
                 $(this).html(lesstext);
                 $('.abstract').addClass('hidden');
           }
           $(this).parent().prev().slideToggle('fast');
           $(this).prev().slideToggle('fast');
                return false;
        });
    });
</script>
<style>
   .morecontent { display: none; }
   .morelink { display: block; cursor: pointer; color:#2196f3; }
   .morelink:hover { text-decoration:underline; }
   .hidden { display:none; }
</style>

@endsection
