@extends('promoter.layouts.app')
	@section('main')

<div class="row">
		<div class="row mt">
			<h2><i class="fa fa-angle-right"></i>Contenido principal</h2>
		</div>

		<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Álbumes</span>
	            <i class="material-icons small">music_note</i> 
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$albums}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_albums')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>


      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Canciones</span>
	            <i class="material-icons small">music_note</i> 
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$singles}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_single')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>						

      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Tvs</span>
	            <i class="small material-icons" >live_tv</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$tv}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_tv')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>
			
      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Radios</span>
	            <i class="small material-icons" >radio</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$radios}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_radio')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>
		
		<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Series</span>
	            <i class=" material-icons" >local_movies</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$series}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_series')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>

      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Peliculas</span>
	            <i class="material-icons" >live_tv</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$movies}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_movies')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>

		<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Autores literarios</span>
	            <i class=" material-icons">group</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$BookAuthor}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('admin_autors')}}" class="btn btn-primary indigo">Revisar autores</a>
	          </div>
	        </div>
      	</div>			

		<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Artistas musicales</span>
	            <i class=" material-icons">group</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$musicAuthors}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('admin_musician')}}" class="btn btn-primary indigo">Revisar musicos</a>
	          </div>
	        </div>
      	</div>

      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Libros</span>
	            <i class="small material-icons" >book</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$books}}</p>
	            </h4>
	            <h6>Sagas de libros pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$sagaBooks}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_books')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>		

      	<div class="col s12 m6 l3">
	        <div class="card pink darken-3 darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Revistas</span>
	            <i class="small material-icons" >import_contacts</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$megazines}}</p>
	            </h4>
	            <h6>Publicaciones periodicas pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$publicationChain}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_megazine')}}" class="btn btn-primary indigo">Revisar</a>
	          </div>
	        </div>
      	</div>
</div>
		
	@endsection
	@section('js')
	@endsection