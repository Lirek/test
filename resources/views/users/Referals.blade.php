@extends('layouts.app')

@section('main')

<div class="container">
	<div class="row">
	   
       <div class="col s4">
         <div class="card-panel teal">  
           <div class="center">
             <h3><spam class="white-text">Mi Codigo de Referido</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
             <h3><spam class="white-text">{{Auth::user()->codigo_ref}}</spam></h3>  
           </div>

        </div>
    </div>

    <div class="col s4">
         <div class="card-panel">  
           <div class="center">
             <h3><spam class="black-text">Invitar Por Correo</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
            <br>
                <form action="{{url('Invite')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="input-field inline">
                  
                  <input id="email_inline" type="email" name="email" required class="validate">
                  <label for="email_inline">Email</label>
                                   
                                   <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>            
                  </div>
                    

                </form>
           </div>

        </div>
    </div>

     <div class="col s4">
         <div class="card-panel teal">  
           <div class="center">
             <h3><spam class="white-text">Mi Enlace</spam></h3>
           </div>
                
           <div class="divider"></div>
             

           <div class="center">
                <p><span class="white-text">{{url('/').'/register/'.Auth::user()->codigo_ref}}</span> </p>
           </div>

        </div>
    </div>                
                            
                            
    </div>                        
         
                            
    <div class="row">

        <div class="col s5">
            <div class="card-panel">  
           <div class="center">
             <h3><spam class="black-text">Mi Codigo QR</spam></h3>
           </div>
                
           <div class="divider"></div>
           <br>
           <div class="center">
                {!! QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref); !!}
           </div>

            </div>
        </div>
    </div>



@endsection

@section('js')

@endsection 
