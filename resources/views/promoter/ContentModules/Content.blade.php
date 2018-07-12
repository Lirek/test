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
				        labels: ["Singles","Libros", "Albums", "Revistas", "Peliculas", "Radios", "Tvs","Series"],

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
});
</script>
@endsection