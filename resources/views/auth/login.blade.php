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
            <h1>SATUMSS</h1>
            <form method="POST" action="/auth/login" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-8">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="review-slider">
    </div>
@endsection
