@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        @include('alerts.request')
        {!!Form::open(['route'=>'profesional.store', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <legend>Cambio de Tribunales</legend>
        @foreach($proyecto->proyectoTribunales as $profesional)
            <div class="row">
                <div class="col-sm-6">
                    <address>
                        <strong>{{$profesional->name}} - {{$profesional->surname}}</strong><br>
                        <a href="#">{{$profesional->code_number}}</a>
                    </address>
                </div>
                <div class="col-sm-6">
                    <select name="proyecto_id" class="form-control">
                        @foreach($profesionals as $profesional)
                            <option value="{{ $profesional->id }}">{{$profesional->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
        @endforeach
        {!!Form::submit('Guardar Cambios',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
@endsection
