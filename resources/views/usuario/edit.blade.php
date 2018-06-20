@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT', 'class' => 'form-horizontal'])!!}
        <fieldset>
            <legend>Editar Administrador</legend>
            @include('usuario.forms.usr')
            <div class="form-group">
    {!!Form::label('email','Correo:',['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
</div>
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            <a href="/usuario">  <button type="button"class="btn btn-primary" href name="Close"> Cancelar</button></a>
        </fieldset>
        {!!Form::close()!!}
    </div>
@endsection
