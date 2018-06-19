@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::open(['route'=>'auxiliar.store', 'method'=>'POST', 'class'=> 'form-horizontal'])!!}
        <legend>Crear Auxiliar</legend>
        @include('auxiliar.forms.auxi')
        @include('auxiliar.forms.create-fields')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
@endsection
