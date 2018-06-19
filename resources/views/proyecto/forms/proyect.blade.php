<div class="col-sm-10 col-sm-offset-1">
	<div class="form-group">
		{!!Form::label('titulo','Titulo:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			{!!Form::text('titulo',null, ['class'=>'form-control', 'placeholder'=>'Ingresar Titulo'])!!}
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('author','Autor:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			{!!Form::text('author',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del Autor'])!!}
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('tutor_id','Tutor:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			<select name="tutor_id" class="form-control js-example-basic-single" id="educationDate">
				@foreach($tutores as $tutor)
					<option value="{{ $tutor->id }}">{{$tutor->name}} - {{$tutor->surname}} - {{$tutor->code_number}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('namecarre_id','Carrera:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			{!!Form::select('namecarre_id',$carreras, null, ['class' => 'form-control js-example-basic-single'])!!}
		</div>
	</div>

    <div class="form-group">
        {!!Form::label('gestion_id','Gestion:', ['class' => 'col-sm-2 control-label'])!!}
        <div class="col-sm-10">
            <select name="gestion_id" class="form-control js-example-basic-single" id="gestion_id">
                @foreach($gestiones as $gestion)
                    <option value="{{ $gestion->id }}">{{$gestion->name_gestion}}</option>
                @endforeach
            </select>
        </div>
    </div>

	<div class="form-group">
		{!!Form::label('area_id','Area:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			<select name="area_id" class="form-control js-example-basic-single" id="area_id">
				@foreach($areas as $area)
					<option value="{{ $area->id }}">{{$area->nameare}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('subarea_id','Sub Area:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10" id="subarea">
			{!!Form::select('subarea_id',[], null, ['class' => 'form-control js-example-basic-single'])!!}
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('namemodal_id','Modalidad:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			{!!Form::select('namemodal_id',$modalidads, null, ['class' => 'form-control js-example-basic-single'])!!}
		</div>
	</div>

	<div class="form-group">
		{!!Form::label('namemodal_id','Proyecto:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			{!!Form::file('path')!!}
		</div>
	</div>
	<div class="form-group">
		{!!Form::label('descripcion','Descripción:', ['class' => 'col-sm-2 control-label'])!!}
		<div class="col-sm-10">
			<textarea name="descripcion" class="form-control" rows="5" placeholder="Descripcion del proyecto"></textarea>
		</div>
	</div>

</div>