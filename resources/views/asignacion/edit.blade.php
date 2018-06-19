@extends('layouts.admin')
@section('content')
  <table class="table">
		
  		<thead>
		  <th>Titulo</th>
			<th>Tribunal 1</th>
			<th>Tribunal 2</th>
			<th>Tribunal 3</th>

  			<th>Operacion</th>
  		</thead>

  		@foreach($asignaciones as $edit)
  			<tbody>
				<td>{{$edit->titulo}}</td>
  				<td>{{$edit->name_id}}</td>
				<td>{{$edit->name_id}}</td>
				<td>{{$edit->name_id}}</td>

  				<td>
  					{!!link_to_route('asignacion.edit', $title = 'Cambiar', $attributes = ['class'=>'btn btn-primary'])!!}
  					{{-- {!!Form::open(['route'=>['asignacion.destroy', $var->id], 'method' => 'DELETE'])!!}
  						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
  					{!!Form::close()!!} --}}
  				</td>
  			</tbody>
  		@endforeach
  	</table>
    {{-- {!!$var->render()!!} --}}
@endsection
