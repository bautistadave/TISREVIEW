@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

	@section('content')
	<table class="table">
		<thead>
		    <th>Codigo</th>
            <th>Carrera</th>
			<th>Operacion</th>

		</thead>
		@foreach($carreras as $carrera)
			<tbody>
				<td>{{$carrera->code}}</td>
                <td>{{$carrera->namecarre}}</td>
				<td>
					{!!link_to_route('carrera.edit', $title = 'Editar', $parameters = $carrera, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!Form::open(['route'=>['carrera.destroy', $carrera], 'method' => 'DELETE'])!!}
							{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					{!!Form::close()!!}
				</td>
			</tbody>
		@endforeach
	</table>
  
  {!!$carreras->render()!!}
	@endsection
