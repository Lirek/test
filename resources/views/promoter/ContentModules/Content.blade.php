@extends('promoter.layouts.app')

@section('main')



<div class="row mt">
                      
                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Contenido Total</h4>
                              <div class="panel-body text-center">
                                  <canvas id="barra" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Contenido por Aprobar</h4>
                              <div class="panel-body text-center">
                                  <canvas id="Torta" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
</div>


<div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Contenido Principal Pendiente</h2>
</div>
<div class="row mt">
   
   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-compact-disc fa-4x"></i>
			<p>Albumes</p>
			<p>{{$albums}}</p>
			<p class="user"><a href="{{url('/admin_albums')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
	   </div>
   </div>

   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-music fa-4x"></i>
			<p>Singles</p>
			<p>{{$singles}}</p>
			<p class="user"><a href="{{url('/admin_single')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
	   </div>
   </div>
   
   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-book-open fa-4x"></i>
			<p>Revistas</p>
			<p>{{$megazines}}</p>
			<p class="user"><a href="{{url('/admin_megazine')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>

   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-book fa-4x"></i>
			<p>Libros</p>
			<p>{{$books}}</p>
			<p class="user"><a href="{{url('/admin_books')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>
</div>

<div class="row mt">
	<div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-tv fa-4x"></i>
			<p>Tvs</p>
			<p>{{$tv}}</p>
			<p class="user"><a href="{{url('/admin_tv')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>

   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-broadcast-tower fa-4x"></i>
			<p>Radios</p>
			<p>{{$radios}}</p>
			<p class="user"><a href="{{url('/admin_radio')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>

   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-video fa-4x"></i>
			<p>Series</p>
			<p>{{$series}}</p>
			<p class="user"><a href="{{url('/admin_albums')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>

   <div class="col-md-3">                      
	   <div class="twitter-panel pn">
			<i class="fas fa-film fa-4x"></i>
			<p>Peliculas</p>
			<p>{{$movies}}</p>
			<p class="user"><a href="{{url('/admin_movie')}}"><button type="button" class="btn btn-theme">Revisar</button></a></p>
		</div>
   </div>
</div>


<div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Etiquetas</h2>	
</div>

<div class="row mt">

					  <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Etiquetas Totales</h4>
                              <div class="panel-body text-center">
                                  <canvas id="TagsBarr" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Etiquetas Por Aprobar</h4>
                              <div class="panel-body text-center">
                                  <canvas id="TagsPie" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
</div>

<div class="row mt">
	<center>
	 <a href="{{url('TagsReview')}}">
		<button type="button" class="btn btn-theme">Revisar Etiquetas</button type="button" class="btn btn-theme">
	 </a>
	</center>
</div>	

<div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Artistas Musicales</h2>	
</div>

<div class="row mt">
	
					<div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Artistas o Agrupaciones Totales</h4>
                              <div class="panel-body text-center">
                                  <canvas id="MusicianBar" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-6">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i>Autores Musicales Totales</h4>
                              <div class="panel-body text-center">
                                  <canvas id="MusicianPie" height="300" width="400"></canvas>
                              </div>
                          </div>
                      </div>
</div>

<div class="row mt">
	<center>
	 <a href="{{url('admin_musician')}}">
		<button type="button" class="btn btn-theme">Revisar Musicos</button type="button" class="btn btn-theme">
	 </a>
	</center>
</div>

<div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Autores Literarios</h2>	
</div>

<div class="row mt">
	
	   <div class="col-md-3">
			<div class="twitter-panel pn">
				<i class="fas fa-book fa-4x"></i>
				<p>{{$BookAuthor}}</p>
				 
				 <a href="{{url('admin_autors')}}">
					<button type="button" class="btn btn-theme">Revisar Autores</button type="button" class="btn btn-theme">
				 </a>
			</div>
		</div>
	
</div>
@endsection

@section('js')
<script>
$(document).ready(function(){

	$.ajax({
		url:'ContentAdminGraph',
		
		type:'GET',
		
		success: function(respuesta) {
		
				var data=respuesta;

				var ctx = document.getElementById("barra");

				var myChart = new Chart(ctx, {
				    
				    type: 'bar',

				    data: {
				        labels: ["Singles","Albums", "Libros", "Revistas", "Peliculas", "Radios", "Tvs","Series"],

				        datasets: [{
				            label: 'Contenido Total',
				            data: data,

				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)',
				                'rgba(76, 175, 80, 0.2)',
				                'rgba(35, 181, 230, 0.2)',
				            ],

				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)',
				                'rgba(76, 175, 80, 0.2)',
				                'rgba(35, 181, 230, 0.2)',
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
                                  },
	});

	$.ajax({

		url:'ContentStatusAdminGraph',

		type:'GET',

		success:function(x) {
			
			var ctx = document.getElementById("Torta");

			var data ={
    					datasets: [{
        							data: x,
        							backgroundColor: [
					                				'rgba(255, 99, 132)',
					                				'rgba(54, 162, 235)',
					                				],
									borderColor: [
					                				'rgba(255,99,132,1)',
					                				'rgba(54, 162, 235, 1)'
					                			],				                
									
									borderWidth: 1

    							  }],
    					labels: [
							        'Por Aprobar',
							        'Aprobado',
							    ]
                		
						};

			


			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    
			   
			});
		},

		error:function() {
			console.log('erro');
		}
	});

	$.ajax({

		url: 'TagsGraphData',
		type: 'GET',

		success:function(x) {

			var ctx = document.getElementById("TagsBarr");
			var data = {
					        labels: ["Musica", "Peliculas", "Radios", "TV", "Libros", "Revistas","Series"],
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

		error:function() {
			console.log('Error');
		}
	});

	$.ajax({

		url: 'TagsStatusGraphData',
		type: 'GET',

		success:function(x) {
			var ctx = document.getElementById("TagsPie");

			var data ={
    					datasets: [{
        							data: x,
        							backgroundColor: [
					                				'rgba(255, 99, 132)',
					                				'rgba(54, 162, 235)',
					                				],
									borderColor: [
					                				'rgba(255,99,132,1)',
					                				'rgba(54, 162, 235, 1)'
					                			],				                
									
									borderWidth: 1

    							  }],
    					labels: [
							        'Por Aprobar',
							        'Aprobado',
							    ]
                		
						};

			


			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    
			   
			});
		},

		error:function() {
			console.log('Error');
		}
	});

	$.ajax({

		url: 'MusicianStatusGraphData',
		type: 'GET',

		success:function(x) {
			var ctx = document.getElementById("MusicianPie");

			var data ={
    					datasets: [{
        							data: x,
        							backgroundColor: [
					                				'rgba(255, 99, 132)',
					                				'rgba(54, 162, 235)',
					                				],
									borderColor: [
					                				'rgba(255,99,132,1)',
					                				'rgba(54, 162, 235, 1)'
					                			],				                
									
									borderWidth: 1

    							  }],
    					labels: [
							        'Por Aprobar',
							        'Aprobado',
							    ]
                		
						};

			


			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    
			   
			});
		},

		error:function() {
			console.log('Error');
		}
	});

	$.ajax({

			url: 'MusicianGraphData',
			type: 'GET',

			success:function(x) {

				var ctx = document.getElementById("MusicianBar");
				var data = {
						        labels: ["Solista", "Agrupacion Musical"],
						        datasets: [{
						            label: 'Musicos',
						            data: x,
						            backgroundColor: [
						                'rgba(255, 99, 132, 0.2)',
						                'rgba(54, 162, 235, 0.2)'
						            ],
						            borderColor: [
						                'rgba(255,99,132,1)',
						                'rgba(54, 162, 235, 1)'
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

			error:function() {
				console.log('Error');
			}
	});

});
</script>
@endsection