@extends('layouts.admin')
@section('content')

	<h4> Nombre del Proyecto : {{ $proyecto->titulo }}</h4>
  <table class="table">

  		<thead>
			<th>ID</th>

  			<th>Tribunales</th>
			  <th>Operacion</th>
  		</thead>

  		@foreach($asignaciones as $assigned)
  			<tbody>
				<td>{{$assigned->titulo_id}}</td>
  				<td>{{ \App\Profesional::findOrFail($assigned->name_id)->name }}</td>

  				<td>

  					{!!Form::open(['route'=>['asignacion.edit', $assigned->id], 'method' => 'PUT'])!!}
  						{!!Form::submit('cambiar',['class'=>'btn btn-danger'])!!}
  					{!!Form::close()!!}
  				</td>
  			</tbody>
  		@endforeach
  	</table>
    {{-- {!!$var->render()!!} --}}
@endsection
