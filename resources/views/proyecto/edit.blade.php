@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        @include('alerts.request')
        {!!Form::model($proyecto,['route'=>['proyecto.update',$proyecto->id],'method'=>'PUT','files' => true, 'class' => 'form-horizontal'])!!}
        @include('proyecto.forms.proyect')
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@endsection
