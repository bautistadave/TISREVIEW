<div class="form-group">
    {!!Form::label('name','Nombre:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('surname','Apellido:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('surname',null, ['class'=>'form-control', 'placeholder'=>'Ingresar apellido'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('phone','Telefono:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Ingresa el numero de telefono'])!!}
    </div>
</div>

<div class="form-group">
    <label for="educationDate" class="col-sm-2 control-label">Areas:</label>
    <div class="col-sm-10">
        <select name="nameare_id[]" size="5" class="form-control js-example-basic-multiple" id="educationDate" multiple>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{$area->nameare}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!!Form::label('namecarre_id','Carrera:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::select('namecarre_id',$carreras, null, ['class'=> 'form-control'])!!}
    </div>
</div>
<div class="form-group">
    <label for="invitado" class="col-sm-2 control-label">Invitado:</label>
    <div class="col-sm-10">
        <select name="invitado" id="invitado" class="form-control">
            <option value="Si">SI</option>
            <option value="No">NO</option>
        </select>
    </div>
</div>
{{-- fin de registro de profesional --}}
