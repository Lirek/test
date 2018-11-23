@extends('layouts.app')

@section('css')

@endsection

@section('main')
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
				<span class="grey-text"><h4><b><i class="material-icons small">radio</i> Radios</b></h4></span>
                        <div class="row">
                            <div class="input-field col s12 m6 offset-m3">
                                <form method="POST"  id="SaveSong" action="{{url('SearchListenRadio')}}">
                                    {{ csrf_field() }}
                                    <i class="material-icons prefix blue-text">search</i>
                                    <input type="text" id="seach" name="seach" class="validate">
                                    <label for="seach">Buscar radio</label><br>
                                    {{--<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>--}}
                                </form>
                            </div>
                        </div>

                        <div class="row">
                                @foreach($Radio as $radios)
                                <div class="col s12 m3">
                                    <div class="card">
                                        <div class="card-image" style="height: 200px;">
                                            <a href="{{url('ListenRadio/'.$radios->id)}}"><img src="{{asset($radios->logo)}}" height="200px"></a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{url('ListenRadio/'.$radios->id)}}"><i class="material-icons">radio</i></a>

                                        </div>
                                        <div class="card-action ">
                                            <b class="grey-text">{{$radios->name_r}}</b>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript">

        $(document).ready(function(){
            $('#seach').keyup(function(evento){
                $('#buscar').attr('disabled',true);
            });
            $('#buscar').attr('disabled',true);
            $('#seach').autocomplete({
                source: "SearchRadio",
                minLength: 2,
                select: function(event, ui){
                    $('#seach').val(ui.item.value);
                    var valor = ui.item.value;
                    console.log(valor);
                    if (valor=='No se encuentra...'){
                        $('#buscar').attr('disabled',true);
                        swal('Radio no se encuentra regitrada','','error');
                    }else{
                        $('#buscar').attr('disabled',false);
                    }
                }

            });
        });
	</script>
@endsection