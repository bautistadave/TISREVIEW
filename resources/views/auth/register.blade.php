<!-- resources/views/auth/login.blade.php -->



@extends('layouts.principal')
@section('content')
    @include('alerts.errors')
    @include('alerts.request')

    <div class="header">
        <div class="top-header">
            <div class="logo">
                <a href="index.html"><img src="/images/fcyt.png" alt="" /></a>
                <p>ASIGNACION DE TRIBUNALES</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="header-info">
            <h4 style="color: white">SATUMSS</h4>
            <form method="POST" action="/auth/register" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Nombres</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Contraseña</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="control-label col-sm-2">Repita contraseña</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8"><button type="submit" class="btn btn-primary">Registrar</button></div>
                </div>
                <br><br>
            </form>

        </div>
    </div>
    <div class="review-slider">
    </div>
@endsection
