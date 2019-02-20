@extends('promoter.layouts.app')
	@section('main')

<div class="row">
		<div class="row mt">
			<h2><i class="fa fa-angle-right"></i>Contenido principal</h2>
		</div>

		<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Álbumes</span>
	            <i class="material-icons small">music_note</i> 
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$albums}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_albums')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>


      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Canciones</span>
	            <i class="material-icons small">music_note</i> 
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$singles}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_single')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>						

      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Tvs</span>
	            <i class="small material-icons" >live_tv</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$tv}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_tv')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>
			
      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Radios</span>
	            <i class="small material-icons" >radio</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$radios}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_radio')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>
		
		<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Series</span>
	            <i class=" material-icons" >local_movies</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$series}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_series')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>

      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Peliculas</span>
	            <i class="material-icons" >live_tv</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$movies}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('/admin_movies')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>

		<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Autores literarios</span>
	            <i class=" material-icons">group</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$BookAuthor}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('admin_autors')}}" class="btn btn-primary">Revisar autores</a>
	          </div>
	        </div>
      	</div>			

		<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
	          <div class="card-content white-text">
	            <span class="card-title">Artistas musicales</span>
	            <i class=" material-icons">group</i>
	            <h6>Pendientes por aprobar:</h6>
	            <h4>
	              <p>{{$musicAuthors}}</p>
	            </h4>
	          </div>
	          <div class="card-action">
	            <a href="{{url('admin_musician')}}" class="btn btn-primary">Revisar musicos</a>
	          </div>
	        </div>
      	</div>

      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
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
	            <a href="{{url('/admin_books')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>		

      	<div class="col s12 m6 l3">
	        <div class="card light-blue darken-3 hoverable">
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
	            <a href="{{url('/admin_megazine')}}" class="btn btn-primary">Revisar</a>
	          </div>
	        </div>
      	</div>
</div>

	@endsection
	@section('js')
		<script>
			$(document).ready(function(){
				// grafica de barra para todos los contenidos
				$.ajax({
					url:"{{url('ContentAdminGraph')}}",
					type:'GET',
					success: function(data) {
						console.log(data);
						var ctx = $("#barra");
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: ["Canciones","Álbumes", "Libros", "Revistas", "Peliculas", "Radios", "Tvs","Series"],
								datasets: [{
									label: 'Contenido total',
									data: data,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)',
										'rgba(76, 175, 80, 0.2)',
										'rgba(35, 181, 230, 0.2)'
									],
									borderColor: [
										'rgba(255,99,132,1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)',
										'rgba(76, 175, 80, 0.2)',
										'rgba(35, 181, 230, 0.2)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero:true
										}
									}]
								}
							}
						});
					},
					error:function() {
						console.log("No se ha podido obtener la información");
					}
				});
				// grafica de barra para todos los contenidos

				// grafica de torta para los contenidos por aprobar y los aprobados
				$.ajax({
					url:"{{url('ContentStatusAdminGraph')}}",
					type:'GET',
					success:function(info) {
						console.log(info);
						var ctx = $("#Torta");
						var data = {
							datasets: [{
								data: info,
								backgroundColor: [
									'rgba(76, 155, 80)',
									'rgba(33, 150, 243)',
									'rgba(244, 67, 54)'
								],
								borderColor: [
									'rgba(76, 155, 80, 1)',
									'rgba(33, 150, 243, 1)',
									'rgba(244, 67, 54, 1)'
								],
								borderWidth: 1
							}],
							labels: [
								'Aprobado',
								'Por Aprobar',
								'Denegados'
							]
						};
						var myPieChart = new Chart(ctx,{
							type: 'pie',
							data: data,
						});
					},
					error:function(info) {
						console.log(info);
					}
				});
				// grafica de torta para los contenidos por aprobar y los aprobados

				// grafica de barra para las etiquetas
				$.ajax({
					url: "{{url('TagsGraphData')}}",
					type: 'GET',
					success:function(x) {
						var ctx = $("#TagsBarr");
						var data = {
					        labels: ["Música", "Películas", "Radios", "TV", "Libros", "Revistas", "Series"],
					        datasets: [{
					            label: 'Etiquetas',
					            data: x,
					            backgroundColor: [
					                'rgba(255, 99, 132, 0.2)',
					                'rgba(54, 162, 235, 0.2)',
					                'rgba(255, 206, 86, 0.2)',
					                'rgba(75, 192, 192, 0.2)',
					                'rgba(153, 102, 255, 0.2)',
					                'rgba(255, 159, 64, 0.2)',
					                'rgba(254, 129, 63, 0.2)'
					            ],
					            borderColor: [
					                'rgba(255,99,132,1)',
					                'rgba(54, 162, 235, 1)',
					                'rgba(255, 206, 86, 1)',
					                'rgba(75, 192, 192, 1)',
					                'rgba(153, 102, 255, 1)',
					                'rgba(255, 159, 64, 1)',
					                'rgba(254, 129, 63, 1)'
					            ],
					            borderWidth: 1
					        }]
	    			   };
	    			   var options = {
		    			   	scales: {
		    			   		yAxes: [{
		    			   			ticks: {
		    			   				beginAtZero:true
		    			   			}
		    			   		}]
		    			   	}
	    			   };

	    			   var TagsBarr = new Chart(ctx,{
	    			   	type: 'bar',
	    			   	data: data,
	    			   	options: options
	    			   });
	    			},
	    			error:function(x) {
	    				console.log(x);
	    			}
	    		});
	    		// grafica de barra para las etiquetas

	    		// grafica de torta para las etiquetas por aprobar y las aprobadas
	    		$.ajax({
	    			url: "{{url('TagsStatusGraphData')}}",
	    			type: 'GET',
	    			success:function(x) {
	    				var ctx = $("#TagsPie");
	    				var data = {
	    					datasets: [{
	    						data: x,
	    						backgroundColor: [
									'rgba(33, 150, 243)',
		    						'rgba(76, 155, 80)'
	    						],
	    						borderColor: [
									'rgba(33, 150, 243, 1)',
	    							'rgba(76, 155, 80, 1)'
	    						],
	    						borderWidth: 1
	    					}],
	    					labels: [
	    						'Por aprobar',
	    						'Aprobado'
	    					]
	    				};

	    				var myPieChart = new Chart(ctx,{
	    					type: 'pie',
	    					data: data,
	    				});
	    			},
	    			error:function(x) {
	    				console.log(x);
	    			}
	    		});
	    		// grafica de torta para las etiquetas por aprobar y las aprobadas

	    		// grafica de torta para los autores musicales
	    		$.ajax({
	    			url: "{{url('MusicianStatusGraphData')}}",
	    			type: 'GET',
	    			success:function(x) {
	    				var ctx = $("#MusicianPie");
	    				var data = {
	    					datasets: [{
	    						data: x,
	    						backgroundColor: [
									'rgba(33, 150, 243)',
	    							'rgba(76, 155, 80)'
	    						],
	    						borderColor: [
									'rgba(33, 150, 243, 1)',
	    							'rgba(76, 155, 80, 1)'
	    						],
	    						borderWidth: 1
	    					}],
	    					labels: [
	    						'Por aprobar',
	    						'Aprobado'
	    					]
	    				};

	    				var myPieChart = new Chart(ctx,{
	    					type: 'pie',
	    					data: data
	    				});
	    			},
	    			error:function(x) {
	    				console.log(x);
	    			}
	    		});
	    		// grafica de torta para los autores musicales

	    		// grafica de barra para los musicos
	    		$.ajax({
	    			url: "{{url('MusicianGraphData')}}",
	    			type: 'GET',
	    			success:function(x) {
	    				var ctx = $("#MusicianBar");
	    				var data = {
	    					labels: ["Solista", "Agrupación musical"],
						        datasets: [{
						        	label: 'Musicos',
						            data: x,
						            backgroundColor: [
						                'rgba(217, 83, 79, 0.2)',
						                'rgba(66, 139, 202, 0.2)'
						            ],
						            borderColor: [
						                'rgba(217, 83, 79, 1)',
						                'rgba(66, 139, 202, 1)'
						            ],
						            borderWidth: 1
						        }]
		    			   };
		    			var options = {
		    				scales: {
		    					yAxes: [{
		    						ticks: {
		    							beginAtZero:true
		    						}
		    					}]
		    				}
		    			};
		    			var MusicianBarr = new Chart(ctx,{
		    				type: 'bar',
		    				data: data,
		    				options: options
		    			});
		    		},
		    		error:function(x) {
		    			console.log(x);
		    		}
		    	});
		    	// grafica de barra para los musicos
	    	});
	    </script>
	@endsection