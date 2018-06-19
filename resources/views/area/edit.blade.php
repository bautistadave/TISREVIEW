@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::model($area,['route'=>['area.update',$area],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
        <legend>Editar Area</legend>
        @include('area.forms.ar')
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
@endsection
