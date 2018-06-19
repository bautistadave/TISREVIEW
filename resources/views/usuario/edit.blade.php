@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT', 'class' => 'form-horizontal'])!!}
        <fieldset>
            <legend>Editar Administrador</legend>
            @include('usuario.forms.usr')
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </fieldset>
        {!!Form::close()!!}
    </div>
@endsection
