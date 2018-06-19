@extends('layouts.admin')

@section('content')
  @include('alerts.request')

{!!Form::model($rol,['route'=>['rol.update',$rol],'method'=>'PUT'])!!}

    @include('rol.forms.rol')
    {!!Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}



@endsection
