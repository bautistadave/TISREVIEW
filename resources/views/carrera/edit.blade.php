@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($carrera,['route'=>['carrera.update',$carrera],'method'=>'PUT'])!!}
			@include('carrera.forms.carrer')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		
	@endsection