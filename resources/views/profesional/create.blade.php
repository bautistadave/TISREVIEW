@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        @include('alerts.request')
        {!!Form::open(['route'=>'profesional.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <legend>Crear Profesional</legend>
        @include('profesional.forms.profesiona')
        @include('profesional.forms.create-fields')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
@endsection
