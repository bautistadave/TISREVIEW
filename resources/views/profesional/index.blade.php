@extends('layouts.admin')

@section('content')
    @include('alerts.success')
    <legend>Lista de Profesionales</legend>
    <table class="table">
        <thead>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Invitado</th>
        <th>Correo</th>
        <th>Area</th>
        <th>Carrera</th>
        <th>Operacion</th>
        </thead>

        @foreach($profesionals as $profesional)
            <tbody>
            <td><span class="text-primary">{{$profesional->code_number}}</span></td>
            <td>{{$profesional->name}}</td>
            <td>{{$profesional->surname}}</td>
            <td>{{$profesional->phone}}</td>
            <td>{{$profesional->invitado}}</td>
            <td>{{$profesional->email}}</td>
            <td>
                @foreach($profesional->areas as $pro)
                    <span class="badge">{{$pro->nameare}}</span>
                @endforeach
            </td>
            <td>{{$profesional->carrera->namecarre}}</td>
            <td>

                {!!link_to_route('profesional.edit', $title = 'Editar', $parameters = $profesional->id, $attributes = ['class'=>'btn btn-primary'])!!}
                {!!Form::open(['route'=>['profesional.destroy', $profesional->id], 'method' => 'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </td>
            </tbody>
        @endforeach
    </table>
    {!!$profesionals->render()!!}
@endsection
