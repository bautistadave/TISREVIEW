@extends('layouts.admin')

@section('content')
    <legend>Lista de Administradores</legend>
    @include('alerts.success')
    <table class="table">
        <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Correo</th>
        {{-- <th>Rol</th> --}}
        <th>Operacion</th>
        </thead>

        @foreach($users as $user)
            <tbody>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>

            <td>
                {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
                {!!Form::open(['route'=>['usuario.destroy', $user->id], 'method' => 'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </td>
            </tbody>
        @endforeach
    </table>
    {!!$users->render()!!}
@endsection
