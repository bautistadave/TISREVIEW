@extends('layouts.admin')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        @include('alerts.request')
        {!!Form::open(['route'=>'usuario.changepassword', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <fieldset>
            <legend>Cambiar datos</legend>
            <div class="form-group">
                {!!Form::label('name','Nombre:', ['class' => 'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    <div class="form-control-static">
                        {{Auth::user()->name}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                {!!Form::label('name','Email:', ['class' => 'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    <div class="form-control-static">
                        {{Auth::user()->email}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                {!!Form::label('name','Telefono:', ['class' => 'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    <div class="form-control-static">
                        {{Auth::user()->phone}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                {!!Form::label('name','Contraseña:', ['class' => 'col-sm-3 control-label'])!!}
                <div class="col-sm-9">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="input-group">
                        <input type="password" class="form-control pwd" name="password">
                        <span class="input-group-btn">
                            <button class="btn btn-default reveal" type="button">
                                <i class="fa fa-eye"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary pull-right'])!!}
        </fieldset>
        {!!Form::close()!!}
    </div>
@endsection