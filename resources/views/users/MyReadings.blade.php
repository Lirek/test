@extends('layouts.app')

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
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 @if($Books != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Books as $Book)
                <div class="col-lg-5 col-md-5 col-sm-5 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            @if($Book->cover)
                                <img src="images/bookcover/{{$Book->cover}}" width="100%" height="220" style="">

                            @else
                                <img src="#" width="100%" height="220" style="">
                            @endif
                        </div>
                        <div class="profile-01 centered">
                            <p><a href="{{url('ShowMyReadBook/'.$Book->id)}}" style="color: #ffff">Ver mas</p></a>
                        </div>
                        <div class="centered">
                            <h3>{{$Book->title}}</h3>
                            <h6>{{$Book->author->full_name}}</h6>
                            <p class="sinopsis"><b>Sinopsis:</b>{{$Book->sinopsis}}
                            </p>

                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                @endforeach
                @else
                    <h1>No Posee Libros</h1>
                @endif
            </div>
        </div> 
    </div> 
</div> 

@endsection


@section('js')
<script src="jquery-1.10.2.js"></script>
<script>
   $(document).ready(function() {
      var showChar = 300;
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
