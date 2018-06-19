@extends('layouts.admin')

@section('content')
  @include('alerts.success')

  <table class="table">
		<thead>
			<th>Nombre rol</th>
			<th>Operacion</th>
		</thead>
		@foreach($roles as $var)
			<tbody>
				<td>{{$var->nameRol}}</td>
				<td>

					{!!link_to_route('rol.edit', $title = 'Editar', $parameters = $var->id, $attributes = ['class'=>'btn btn-primary'])!!}


          {!!Form::open(['route'=>['rol.destroy', $var->id], 'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					{!!Form::close()!!}

				</td>
			</tbody>
		@endforeach
	</table>

@endsection
