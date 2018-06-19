@extends('layouts.admin')
	@section('content')
		<div class="col-sm-offset-2 col-sm-8">
            @include('alerts.request')
            {!!Form::model($profesional,['route'=>['profesional.update',$profesional->id],'method'=>'PUT','class' => 'form-horizontal'])!!}
            <legend>Editar Profesional</legend>
            @include('profesional.forms.profesiona')
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary pull-right'])!!}
            {!!Form::close()!!}
        </div>
	@endsection