@extends('seller.layouts')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<embed src="{{$megazine->megazine_file}}" width="500" height="375" type='application/pdf'>
@endsection