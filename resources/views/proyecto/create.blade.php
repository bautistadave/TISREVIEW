@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
    <div class="col-sm-8 col-sm-offset-2">
        @include('alerts.request')
        {!!Form::open(['route'=>'proyecto.store', 'method'=>'POST', 'files'=>true, 'class' => 'form-horizontal'])!!}
        <fieldset>
            <legend>Crear Proyecto</legend>
            @include('proyecto.forms.proyect')
        </fieldset>
        {!!Form::submit('Registrar',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
	@endsection