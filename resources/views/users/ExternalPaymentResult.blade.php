@extends('layouts.app')

@section('main')

@if($errors->any())

<h4>{{$errors->first()}}</h4>

@endif

<h1>{{$msg}}</h1>
@endsection

@section('js')
@endsection
