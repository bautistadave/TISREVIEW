@extends('layouts.admin')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{Session::get('message')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <th>Numero</th>
        <th width="25%">Titulo</th>
        <th>Autor</th>
        <th>Carrera</th>
        <th>Estado</th>
        <th>Archivo</th>
        <th>Operacion</th>
        </thead>
        @foreach($proyectos as $proyecto)
            <tbody>
            <td><span class="text-primary">{{$proyecto->project_number}}</span></td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->author}}</td>
            <td>{{$proyecto->namecarre}}</td>
            <td>
                @if($proyecto->defended)
                    <strong class="text-success">CONCLUIDO</strong>
                @else
                    <strong class="text-warning">PENDIENTE</strong>
                @endif
            </td>

            <td>
                <a href="proyectos/{{$proyecto->path}}" target="_blank">
                    <i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i>
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target=".{{$proyecto->project_number}}">
                    <i class="fa fa-lg fa-newspaper-o"></i>
                </button>
                <div class="modal fade {{$proyecto->project_number}}" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detalle del proyecto</h4>
                            </div>
                            <div class="modal-body">
                                <dl class="dl-horizontal">
                                    <dt>Numero:</dt>
                                    <dd>{{$proyecto->project_number}}</dd>
                                    <dt>Titulo:</dt>
                                    <dd>{{$proyecto->titulo}}</dd>
                                    <dt>Autor:</dt>
                                    <dd>{{$proyecto->author}}</dd>
                                    <dt>Carrera:</dt>
                                    <dd>{{$proyecto->namecarre}}</dd>
                                    <dt>Tutor:</dt>
                                    <dd>{{$proyecto->tutor_data}}</dd>
                                    <dt>Area:</dt>
                                    <dd>{{$proyecto->nameare}}</dd>
                                    <dt>Modalidad:</dt>
                                    <dd>{{$proyecto->namemodal}}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                {!!link_to_route('proyecto.edit', $title = 'Editar', $parameters = $proyecto->id, $attributes = ['class'=>'btn btn-info'])!!}
                <a class="btn btn-info" href="/cambiar/estado/proyecto/{{$proyecto->id}}">
                    Estado
                    <i class="fa fa-lg fa-gavel"></i>
                </a>

            </td>
            </tbody>
        @endforeach
    </table>
    {!!$proyectos->render()!!}
@endsection
