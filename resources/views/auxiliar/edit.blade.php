@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::model($aux,['route'=>['auxiliar.update',$aux],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
        <legend>Editar Auxiliar</legend>
        @include('auxiliar.forms.auxi')
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        <a href="/axiliar">  <button type="button"class="btn btn-primary" href name="Close"> Cancelar</button></a>
        {!!Form::close()!!}
    </div>
@endsection
