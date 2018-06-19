@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::open(['route'=>'usuario.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <fieldset>
            <legend>Crear Administrador</legend>
            @include('usuario.forms.usr')
            @include('usuario.forms.user-create')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary pull-right'])!!}
        </fieldset>
        {!!Form::close()!!}
    </div>
@endsection
