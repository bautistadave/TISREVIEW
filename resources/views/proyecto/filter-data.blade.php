@extends('layouts.admin')

@section('content')
    <legend>Resultado de la busqueda</legend>
    <!-- Large modal -->
    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">
        <span class="text-danger">Descargar</span>
        <i class="fa fa-lg fa-file-pdf-o text-danger"></i>
    </button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Resultado generado</h4>
                </div>
                <div class="modal-body">
                    <iframe width="100%" style="height: 70vh" src="{{$url}}#zoom=100"></iframe>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <table class="table table-bordered">
        <thead>
        <th>Numero</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Tutor</th>
        <th>Carrera</th>
        <th>Modalidad</th>
        </thead>
        @foreach($proyectos as $proyecto)
            <tbody>
            <td><span class="text-primary">{{$proyecto->project_number}}</span></td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->author}}</td>
            <td>{{$proyecto->tutor_data}}</td>
            <td>{{$proyecto->namecarre}}</td>
            <td>{{$proyecto->namemodal}}</td>
            </tbody>
        @endforeach
    </table>
@endsection
