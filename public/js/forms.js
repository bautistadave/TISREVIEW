$(document).ready(function () {

    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();

    var last_valid_selection = null;
    loadSubAreas();
    $('#area_id').change(function () {
        loadSubAreas();
    });
    function loadSubAreas() {
        $.ajax({
            type: 'GET',
            url: '/subareas/' + $("#area_id").val(),
            data: {},
            success: function (data) {
                $("#subarea_id").html(data);
            }
        });
    }
});