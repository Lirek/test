@extends('layouts.app')

@section('main')
<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">


	<!-- 
	<embed id="iframepdf" src="{{$pdf}}" width="500" height="375" type='application/pdf'>
 -->
 				<iframe src="http://docs.google.com/gview?url={{$pdf}} &embedded=true" style="width:90%; height:775px;" frameborder="0"></iframe>

			</div>
		</div>
	</div>
</div>


@endsection
@section('js')


@endsection