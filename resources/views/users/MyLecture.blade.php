@extends('layouts.app')
@section('css')
	<style>
		.contenedor{
            position:absolute;
        }
        .pdf{
            position: relative;
        }
        .bloqueo{
            top: 4%;
            left: 5%;
            position: relative;
            background-color: #4d4d4d;
            width: 730px;
            height: 30px;
        }
	</style>
@endsection
@section('main')
<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">

            <div class="contenedor">
            	<div class="pdf">
 					<object data="{{ asset('book')}}/{{ $book->books_file }}#toolbar=0&navpanes=0" width="800px" height="750px" type="application/pdf" name="pdf"  disable="true" align="right"></object>
 				</div>
 				<div class="bloqueo"></div>
 			</div>


			</div>
		</div>
	</div>
</div>


@endsection
@section('js')


@endsection