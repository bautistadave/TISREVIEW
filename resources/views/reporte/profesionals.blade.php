@extends('layouts.admin')
@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <section class="form-horizontal">
            <legend>Generar Reporte por profesional</legend>
            <div class="form-group">
                {!!Form::label('profesional_id','Lista profesionales:', ['class' => 'col-sm-2 control-label'])!!}
                <div class="col-sm-10">
                   <div class="input-group">
                       <select name="profesional_id" class="form-control js-example-basic-single" id="profesional_id">
                           @foreach($profesionales as $profesional)
                               <option value="{{ $profesional->id }}">
                                   {{$profesional->name}} {{$profesional->surname}} - {{$profesional->code_number}}
                               </option>
                           @endforeach
                       </select>
                       <button class="btn btn-primary btn-sm" id="generateReport">Generar Reporte</button>
                   </div>
                </div>
            </div>
        </section>
    </div>
    <div id="example1"></div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#generateReport').click(function () {
                loadSubAreas();
            });
            function loadSubAreas() {
                $.ajax({
                    type: 'GET',
                    url: '/reporte/profesional/' + $("#profesional_id").val(),
                    data: {},
                    success: function (data) {
                        loadFileReport(data)
                    }
                });
            }
            function loadFileReport(url) {
                var options = {
                    page: '1',
                    pdfOpenParams: {
                        view: 'FitH',
                        pagemode: 'thumbs',
                        search: 'lorem ipsum'
                    }
                };
                PDFObject.embed(url, "#example1", options);
            }
        });
    </script>
@endpush
