@extends('layouts.app')
@section('css')
    <style type="text/css">


        .card .card-content {
            padding: 24px 8px 12px 8px;
        }
        .card .card-content .card-title {
            color: #000000;
            display: block;
            line-height: 14px;
            max-height: 14px;
            min-height: 12px;
            overflow: hidden;
            text-decoration: none;
            position: relative;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
        }
        .card .card-title {
            line-height: 1.4;
            font-size: 18px;
        }

        #autor{
            color: #1e88e5 ;
            display: block;
            overflow: hidden;
            text-decoration: none;
            position: relative;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
            font-size: 14px
        }

    </style>

@endsection
@section('main')

    <div class="row">

        <h5>Mis Revistas</h5>
        <br>

        <div class="row">
        @if($Megazines != 0)
            @foreach($Megazines as $Megazine)
                <!-- PROFILE 01 PANEL -->
                    <div class="col s6 m3 ">
                        <div class="card">

                            <a href="{{url('ShowMyReadMegazine/'.$Megazine->id)}}">
                            @if($Megazine->cover)
                                    <div class="card-image">
                                        <img src="{{asset($Megazine->cover)}}" width="100%" height="300" style="">
                                        <a href="{{url('ShowMyReadMegazine/'.$Megazine->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue btn tooltipped " data-position="bottom" data-tooltip="Detalles"><i class="mdi mdi-book-open-page-variant"></i></a>

                                    </div>
                                @else
                                    <div class="card-image grey lighten-2">
                                        <img src="#" width="100%" height="300"  style="">
                                        <a href="{{url('ShowMyReadMegazine/'.$Megazine->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 btn tooltipped" data-position="top" data-tooltip="Detalles"><i class="mdi mdi-book-open-page-variant"></i></a>
                                    </div>

                                @endif
                            </a>
                            <div class="card-content">
                              <span class="card-title title"> <b>{{$Megazine->title}}</b> </span>
                               <span class="card-title blue-text title" style=" font-size: 16px;"> <b>{{$Megazine->Seller->name}}</b> </span>
                            </div>


                        </div>
                    </div>

                @endforeach
            @else
                <div class="col s6 offset-s3">
                    <br><br>
                    <blockquote >
                        <i class="material-icons fixed-width large grey-text">import_contacts</i><br><h5 blue-text text-darken-2>No Posee Revistas adquiridas</h5>
                    </blockquote>
                </div>
        </div><!--End div row -->
        @endif
    </div>



@endsection


@section('js')

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
