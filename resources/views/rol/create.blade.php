@extends('layouts.admin')

@section('content')
 @include('alerts.request')
  {!!Form::open(['route'=>'rol.store', 'method' => 'POST'])!!}
      @include('rol.forms.rol')

      {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

  {!!Form::close()!!}
@endsection
