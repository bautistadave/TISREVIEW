<select name="subarea_id" class="form-control js-example-basic-single" id="educationDate">
    @foreach($subareas as $area)
        <option value="{{ $area->id }}">{{$area->nameare}}</option>
    @endforeach
</select>