@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Historial de los {{ $tipo }}s</h3></span>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Costo</th>
				<th><i class="material-icons"></i>Desde</th>
				<th><i class="material-icons"></i>Hasta</th>
			</tr>
		</thead>
		<tbody>
			@foreach($historial as $his)
				<tr>
					<td>{{ $his->costo }}</td>
					<td>{{ $his->desde }}</td>
					@if($his->hasta!=null)
						<td>{{ $his->hasta }}</td>
					@else
						<td>Actual</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<div class="row">
		<div class="col s12">
			<a href="{{url('conversiones')}}" class="btn curvaBoton waves-effect waves-pink green">Atras</a>
		</div>
	</div>
@endsection
@section('js')
@endsection