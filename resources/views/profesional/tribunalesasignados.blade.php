<table class="table">
    <thead>
    <th>Codigo Tribunal</th>
    <th>Nombres</th>
    <th>Operaciones</th>
    </thead>

    @foreach($tribunales as $tribunal)
        <tbody>
        <td>
            <span class="text-primary">{{$tribunal->code_number}}</span>
        </td>
        <td>
            {{$tribunal->name}} - {{$tribunal->surname}}
        </td>
        <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".{{$tribunal->id}}">
                Cambiar
                <i class="fa fa-lg fa-refresh"></i>
            </button>
            <div class="modal fade {{$tribunal->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Cambio de Tribunal</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning">
                                <i>NOTA</i>
                                Se tiene asignado como tribunal al profesional
                                <strong>{{$tribunal->name}} {{$tribunal->surname}}</strong>
                                una vez que haga el cambio no podra volver a selecionarlo.
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Profesionales:</label>
                                    <div class="col-sm-9">
                                        <select name="profesionalID{{$tribunal->id}}"
                                                class="form-control js-example-basic-single"
                                                id="profesionalID{{$tribunal->id}}">
                                            @foreach($profesionals as $profesional)
                                                <option value="{{ $profesional->id }}">
                                                    {{$profesional->name}} - {{$profesional->surname}}
                                                    - {{$profesional->code_number}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description{{$tribunal->id}}" class="control-label col-sm-3">Motivo del
                                        cambio</label>
                                    <div class="col-sm-9">
                                        <textarea name="description{{$tribunal->id}}" class="form-control"
                                                  id="description{{$tribunal->id}}" cols="30" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-info pull-right"
                                                onclick="changeTribunalAjax({{$tribunal->id}},{{$tribunal->profesional_id}})">
                                            Guardar cambio
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </td>
        </tbody>
    @endforeach
</table>