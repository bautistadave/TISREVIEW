@extends('layouts.admin')
@section('content')
    <legend>Lista de proyectos</legend>
    <div class="alert alert-info">
        La lista de proyectos donde se visualiza cuantos tribunales asignados tiene en la columna Tribunales.
    </div>
    <table class="table">
        <thead>
        <th>Proyecto</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Tribunales</th>
        </thead>

        @foreach($proyectos as $proyecto)
            <tbody>
            <td>{{$proyecto->titulo}}</td>
            <td>
                {{$proyecto->descripcion}}
            </td>
            <td>
                @if($proyecto->defended)
                    <strong class="text-success">DEFENDIDO</strong>
                @else
                    <span class="text-muted">PENDIENTE</span>
                @endif
            </td>
            <td>
                @foreach($proyecto->proyectoTribunales as $profesional)
                    <span class="badge badge-success">
                        {{$profesional->name}} - {{$profesional->surname}} - {{$profesional->code_number}}
                    </span> <br>
                @endforeach
            </td>
            </tbody>
        @endforeach
    </table>
    {!!$proyectos->render()!!}
@endsection
