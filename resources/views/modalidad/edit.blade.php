@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($modalidad,['route'=>['modalidad.update',$modalidad],'method'=>'PUT'])!!}
			@include('modalidad.forms.modalida')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
			<a href="/modalidad">  <button type="button"class="btn btn-primary" href name="Close"> Cancelar</button></a>
		{!!Form::close()!!}

		
	@endsection