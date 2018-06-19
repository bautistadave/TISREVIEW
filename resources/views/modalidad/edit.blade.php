@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($modalidad,['route'=>['modalidad.update',$modalidad],'method'=>'PUT'])!!}
			@include('modalidad.forms.modalida')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		
	@endsection