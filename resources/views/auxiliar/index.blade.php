@extends('layouts.admin')

@section('content')
    <legend>Lista de Auxiliares</legend>
    @include('alerts.success')
    <table class="table">
        <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Operacion</th>
        </thead>

        @foreach($aux as $var)
            <tbody>
            <td>{{$var->name}}</td>
            <td>{{$var->surname}}</td>
            <td>{{$var->phone}}</td>
            <td>{{$var->email}}</td>

            <td>
                {!!link_to_route('auxiliar.edit', $title = 'Editar', $parameters = $var->id, $attributes = ['class'=>'btn btn-primary'])!!}
                {!!Form::open(['route'=>['auxiliar.destroy', $var->id], 'method' => 'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </td>
            </tbody>
        @endforeach
    </table>
    {!!$aux->render()!!}
@endsection
