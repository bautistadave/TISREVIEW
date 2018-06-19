<div class="form-group">
    {!!Form::label('email','Correo:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('password','Contraseña:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa la contraseña del usuario'])!!}
    </div>
</div>

<div class="form-group">
    {!!Form::label('confirmar_contrasena','Confirmar contrasena:', ['class' => 'col-sm-2 control-label'])!!}
    <div class="col-sm-10">
        {!!Form::password('confirmar_contrasena',['class'=>'form-control', 'placeholder'=>'Ingresa la misma contrasena del usuario'])!!}
    </div>
</div>