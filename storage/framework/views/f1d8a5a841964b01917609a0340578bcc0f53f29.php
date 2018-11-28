	<?php $__env->startSection('main'); ?>

		<div class="row mt">
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Contenido total</h4>
					<div class="panel-body text-center">
						<canvas id="barra" height="300" width="400"></canvas>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Contenido por aprobar</h4>
					<div class="panel-body text-center">
						<canvas id="Torta" height="300" width="400"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt">
			<h2><i class="fa fa-angle-right"></i>Contenido principal</h2>
		</div>

		<div class="row mt">
			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-compact-disc fa-6x"></i>
					<h3><p>Álbumes</p></h3>
					<p>Pendientes por aprobar: <?php echo e($albums); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_albums')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-music fa-6x"></i>
					<h3><p>Canciones</p></h3>
					<p>Pendientes por aprobar: <?php echo e($singles); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_single')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-book-open fa-6x"></i>
					<h3><p>Revistas</p></h3>
					<p>Pendientes por aprobar: <?php echo e($megazines); ?></p>
					<p>Publicaciones periodicas pendientes por aprobar: <?php echo e($publicationChain); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_megazine')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-book fa-6x"></i>
					<h3><p>Libros</p></h3>
					<p>Pendientes por aprobar: <?php echo e($books); ?></p>
					<p>Sagas de libros pendientes por aprobar: <?php echo e($sagaBooks); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_books')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>
		</div>

		<div class="row mt">
			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-tv fa-6x"></i>
					<h3><p>Tvs</p></h3>
					<p>Pendientes por aprobar: <?php echo e($tv); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_tv')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-broadcast-tower fa-6x"></i>
					<h3><p>Radios</p></h3>
					<p>Pendientes por aprobar: <?php echo e($radios); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_radio')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-video fa-6x"></i>
					<h3><p>Series</p></h3>
					<p>Pendientes por aprobar: <?php echo e($series); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_series')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="twitter-panel pn">
					<i class="fas fa-film fa-6x"></i>
					<h3><p>Peliculas</p></h3>
					<p>Pendientes por aprobar: <?php echo e($movies); ?></p>
					<p class="user">
						<a href="<?php echo e(url('/admin_movies')); ?>">
							<button type="button" class="btn btn-primary">Revisar</button>
						</a>
					</p>
				</div>
			</div>
		</div>

		<div class="row mt">
			<div class="col-md-6">
				<div class="twitter-panel pn">
					<i class="fas fa-book fa-6x"></i>
					<h3><p>Autores literarios</p></h3>
					<p>Pendientes por aprobar: <?php echo e($BookAuthor); ?></p>
					<a href="<?php echo e(url('admin_autors')); ?>">
						<button type="button" class="btn btn-primary">Revisar autores</button>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="twitter-panel pn">
					<i class="fas fa-music fa-6x"></i>
					<h3><p>Artistas musicales</p></h3>
					<p>Pendientes por aprobar: <?php echo e($musicAuthors); ?></p>
					<a href="<?php echo e(url('admin_musician')); ?>">
						<button type="button" class="btn btn-primary">Revisar musicos</button>
					</a>
				</div>
			</div>
		</div>

		<div class="row mt">
			<h2><i class="fa fa-angle-right"></i>Artistas musicales</h2>	
		</div>

		<div class="row mt">
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Artistas o Agrupaciones (Total)</h4>
					<div class="panel-body text-center">
						<canvas id="MusicianBar" height="300" width="400"></canvas>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Autores Musicales (Total)</h4>
					<div class="panel-body text-center">
						<canvas id="MusicianPie" height="300" width="400"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt">
			<center>
				<a href="<?php echo e(url('admin_musician')); ?>">
					<button type="button" class="btn btn-primary">Revisar musicos</button>
				</a>
			</center>
		</div>

		<div class="row mt">
			<h2><i class="fa fa-angle-right"></i>Etiquetas</h2>	
		</div>

		<div class="row mt">
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Etiquetas totales</h4>
					<div class="panel-body text-center">
						<canvas id="TagsBarr" height="300" width="400"></canvas>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Etiquetas por aprobar</h4>
					<div class="panel-body text-center">
						<canvas id="TagsPie" height="300" width="400"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt">
			<center>
				<a href="<?php echo e(url('TagsReview')); ?>">
					<button type="button" class="btn btn-primary">Revisar etiquetas</button>
				</a>
			</center>
		</div>

	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script>
			$(document).ready(function(){
				// grafica de barra para todos los contenidos
				$.ajax({
					url:"<?php echo e(url('ContentAdminGraph')); ?>",
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
					url:"<?php echo e(url('ContentStatusAdminGraph')); ?>",
					type:'GET',
					success:function(info) {
						console.log(info);
						var ctx = $("#Torta");
						var data = {
							datasets: [{
								data: info,
								backgroundColor: [
									'rgba(217, 83, 79)',
									'rgba(66, 139, 202)'
								],
								borderColor: [
									'rgba(217, 83, 79,1)',
									'rgba(66, 139, 202, 1)'
								],
								borderWidth: 1
							}],
							labels: [
								'Por Aprobar',
								'Aprobado'
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
					url: "<?php echo e(url('TagsGraphData')); ?>",
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
	    			url: "<?php echo e(url('TagsStatusGraphData')); ?>",
	    			type: 'GET',
	    			success:function(x) {
	    				var ctx = $("#TagsPie");
	    				var data = {
	    					datasets: [{
	    						data: x,
	    						backgroundColor: [
		    						'rgba(217, 83, 79)',
									'rgba(66, 139, 202)'
	    						],
	    						borderColor: [
	    							'rgba(217, 83, 79,1)',
	    							'rgba(66, 139, 202, 1)'
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
	    			url: "<?php echo e(url('MusicianStatusGraphData')); ?>",
	    			type: 'GET',
	    			success:function(x) {
	    				var ctx = $("#MusicianPie");
	    				var data = {
	    					datasets: [{
	    						data: x,
	    						backgroundColor: [
	    							'rgba(217, 83, 79)',
									'rgba(66, 139, 202)'
	    						],
	    						borderColor: [
	    							'rgba(217, 83, 79, 1)',
									'rgba(66, 139, 202, 1)'
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
	    			url: "<?php echo e(url('MusicianGraphData')); ?>",
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
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>