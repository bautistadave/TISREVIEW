<div class="">
    <div class="alert alert-warning">
        Al selecionar una area el valor ingresado en <strong>Nombre Area</strong> sera automaticamente una subarea de la area selecionada.
        <br>
        En caso de que no se quiera crear una subarea solo ingrese el nombre del area.

    </div>
</div>
<div class="form-group">
    {!!Form::label('nameare','Nombre Area:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('nameare',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del Area'])!!}
    </div>
</div>
<div class="form-group">
    <label for="area_id" class="col-sm-2 control-label">Area:</label>
    <div class="col-sm-10">
        <select name="area_id" class="form-control js-example-basic-single" id="area_id">
            <option>Selecione al area que pertenece</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{$area->nameare}}</option>
            @endforeach
        </select>
    </div>
</div>