<option>--- Select Tribunal ---</option>
@if(!empty($tribunales))
	@foreach($tribunales as $key => $value)
		<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
	@endforeach
@endif