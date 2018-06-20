@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($carrera,['route'=>['carrera.update',$carrera],'method'=>'PUT'])!!}
			@include('carrera.forms.carrer')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
			<a href="/carrera">  <button type="button"class="btn btn-primary" href name="Close"> Cancelar</button></a>
		{!!Form::close()!!}

		
	@endsection