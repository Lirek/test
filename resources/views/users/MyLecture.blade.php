@extends('layouts.app')

@section('content')

<div class="container">
	
	<embed id="iframepdf" src="{{$pdf}}" width="500" height="375" type='application/pdf'> 	</embed>


</div>

@endsection