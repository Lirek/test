@extends('seller.layouts')
<style type="text/css">
#image-preview {
  width: 400px;
  height: 400px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
}
#image-preview input {
  line-height: 200px;
  font-size: 200px;
  position: absolute;
  opacity: 0;
  z-index: 10;
}
#image-preview label {
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #bdc3c7;
  width: 200px;
  height: 50px;
  font-size: 20px;
  line-height: 50px;
  text-transform: uppercase;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
}

</style>

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
                        <div class="form-group col-md-6">
                          
                        <img src="{{$cover}}" class=".img-thumbnail" style="width:200px;height:200px;  " >

                        </div>
                        
                                                <table class="table table-hover">

                    <thead>

                            <tr>
                            <th>Nombre del Single</th>
                            <th>Audio</th>
                        </tr>

                    </thead>

                     @foreach($songs as $song)
                         <tr>
                            <th>
                                {{$song->song_name}}
                                </th>
                            <th>
                            <audio controls="" src="{{$song->song_file}}">
                                <source src="{{$song->song_file}}" type="audio/mpeg">
                                </audio>
                            </th>
                        @endforeach
                        </table>
@endsection