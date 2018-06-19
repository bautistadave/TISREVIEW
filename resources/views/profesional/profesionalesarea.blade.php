<select name="profesional_id" class="form-control js-example-basic-single" id="profesional_id">
    @foreach($profesionals as $profesional)
                <option value="{{ $profesional->id }}">
                    {{$profesional->name}} - {{$profesional->surname}} - {{$profesional->code_number}}
                </option>
    @endforeach
</select>
