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
            <th>Modalidad</th>
			<th>Operacion</th>

		</thead>
		@foreach($modalidads as $modalidad)
			<tbody>
				<td>{{$modalidad->code}}</td>
                <td>{{$modalidad->namemodal}}</td>
				<td>
					{!!link_to_route('modalidad.edit', $title = 'Editar', $parameters = $modalidad, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!Form::open(['route'=>['modalidad.destroy', $modalidad], 'method' => 'DELETE'])!!}
							{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
					{!!Form::close()!!}
				</td>
			</tbody>
		@endforeach
	</table>
  {!!$modalidads->render()!!}
	@endsection
