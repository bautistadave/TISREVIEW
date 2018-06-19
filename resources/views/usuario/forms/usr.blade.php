<div class="form-group">
    {!!Form::label('name','Nombre:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form:: label ('surname','Apellido:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('surname',null, ['class'=>'form-control', 'placeholder'=>'Ingresar apellido'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form:: label ('phone','Telefono:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Ingresa el numero de telefono'])!!}
    </div>
</div>
