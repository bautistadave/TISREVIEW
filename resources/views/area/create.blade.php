@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::open(['route'=>'area.store', 'method'=>'POST', 'class'=> 'form-horizontal'])!!}
        <legend>Crear Area</legend>
        @include('area.forms.ar')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary pull-right'])!!}
        {!!form::close()!!}
    </div>
@endsection
