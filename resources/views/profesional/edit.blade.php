@extends('layouts.admin')
	@section('content')
		<div class="col-sm-offset-2 col-sm-8">
            @include('alerts.request')
            {!!Form::model($profesional,['route'=>['profesional.update',$profesional->id],'method'=>'PUT','class' => 'form-horizontal'])!!}
            <legend>Editar Profesional</legend>
            @include('profesional.forms.profesiona')
            <div class="form-group">
    {!!Form::label('email','Correo:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
</div>

            {!!Form::submit('Actualizar',['class'=>'btn btn-primary pull-right'])!!}
            <a href="/profesional">  <button type="button"class="btn btn-primary" href name="Close"> Cancelar</button></a>
            {!!Form::close()!!}
        </div>
	@endsection