@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
       <form class="form-horizontal" method="POST">
           <legend>Asignar Tribunales a proyectos</legend>
            <div class="form-group">
                <label class="control-label col-sm-2">Proyectos:</label>
                <div class="col-sm-10">
                    <select name="proyecto_id" class="form-control js-example-basic-single" id="proyecto_id">
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{$proyecto->titulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('profesional_id','Tribunal:', ['class' => 'col-sm-2 control-label'])!!}
                <div id="profesionalSegestion" class="col-sm-10">

                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12"><button class="btn btn-primary pull-right btn-submit">Asignar</button></div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <legend>Tribunales Asignados</legend>
    <div id="tribunalesAsignados">
    </div>
@endsection

