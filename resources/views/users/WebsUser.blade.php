@extends('layouts.app')

@section('main')     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        
        <div class="row mtbox" style="margin-top: 2%">
          <!--PRIMER NIVEL DE REFERIDOS-->
          <!-- <div class="col-md-12 col-sm-12 mb">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Primer nivel de referidos:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="{{url('/').'/register/'.Auth::user()->codigo_ref}}">
                      {{$referals1}}
                    </a></h2>
                  </p>
                </div>
            </div>
          </div>
        </div> -->

          <!--SEGUNDO NIVEL DE REFERIDOS-->
            <!-- <div class="col-md-6 mb">
              <div class="white-panel pn3">
                <div class="white-header">
                  <h5><i class="fa fa-user"></i>Segundo nivel de referidos:</h5>
                </div>
                <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="{{url('/').'/register/'.Auth::user()->codigo_ref}}">
                      {{$referals2}}
                    </a></h2>
                  </p>
                </div>
                </div>
              </div>
            </div> -->

            <!--TERCER NIVEL DE REFERIDOS-->
           <!--  <div class="col-md-6 mb">
              <div class="white-panel pn3">
                <div class="white-header">
                  <h5><i class="fa fa-user"></i>Tercer nivel de referidos:</h5>
                </div>
                <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="{{url('/').'/register/'.Auth::user()->codigo_ref}}">
                      {{$referals3}}
                    </a></h2>
                  </p>
                </div>
                </div>
              </div>
            </div> -->

        <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Total de referidos:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="#">
                      {{$referals1+$referals2+$referals3}}
                    </a></h2>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->
        @if ($refered != null)
        <h5 style="margin-left: 3%">Mis referidos:</h5>
        <div class="col-md-12 col-sm-12" style="margin-left: 1%; margin-top: 1%">
          
          @foreach($refered as $refereds)
              <div class="col-sm-2 col-xs-3 col-md-1">
                @if($refereds->img_perf)
                  <img src="{{asset($refereds->img_perf)}}" class="img-circle" width="60"></a>
                @else
                   <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img-circle" width="60">
                @endif
              </div>
              <div class="col-sm-3 col-xs-3 col-md-3" style="margin-top: 1%">
                {{$refereds->name}}
              </div>
          @endforeach
        </div>
        @endif
       
                      
        </div><!-- /row --> 
           

          @endsection

@section('js')

@endsection