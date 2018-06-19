@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        {!!Form::open(['route'=>'proyecto.filter', 'method'=>'POST', 'class' => 'form-horizontal'])!!}
        <legend>Filtro de proyectos</legend>
        <div class="form-group">
            {!!Form::label('carreras','Carreras:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <select name="carreras[]" multiple id="carreras" class="form-control">
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">
                            {{$carrera->namecarre}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('modalidades','Modalidades:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <select name="modalidades[]" multiple id="modalidades" class="form-control">
                    @foreach($modalidades as $modalidad)
                        <option value="{{ $modalidad->id }}">
                            {{$modalidad->namemodal}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('gestiones','Gestiones:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <select name="gestiones[]" multiple id="gestiones" class="form-control">
                    @foreach($gestiones as $gestion)
                        <option value="{{ $gestion->id }}">
                            {{$gestion->name_gestion}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('firstName','Nombre Estudiante:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <input type="text" name="firstName" class="form-control">
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('lastName','Apellido Estudiante:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <input type="text" name="lastName" class="form-control">
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('query','Palabra a buscar:', ['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
                <input type="text" name="query" class="form-control">
            </div>
        </div>
        {!!Form::submit('Buscar',['class'=>'btn btn-primary pull-right'])!!}
        {!!Form::close()!!}
    </div>
    <div class="clearfix"></div>
    <div id="resultSearchProjects">

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var options = {
            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Buscar'>",
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                        if (e.which === 40){
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                        if (e.which == 40){
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        };
        $('#carreras').multiSelect(options);
        $('#modalidades').multiSelect(options);
        $('#gestiones').multiSelect(options);
    </script>
@endpush
