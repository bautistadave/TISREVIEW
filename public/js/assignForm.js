function loadTribunalesSugestion() {
    if ($("#proyecto_id").val() != null)  {
        $.ajax({
            type: 'GET',
            url: '/profesionals/project/' + $("#proyecto_id").val(),
            data: {},
            success: function (data) {
                $("#profesionalSegestion").html(data);
            }
        });
    }
}

function loadTribunalesAssigned() {
    if ($("#proyecto_id").val() != null) {
        $.ajax({
            type: 'GET',
            url: '/tribunales/asignados/' + $("#proyecto_id").val(),
            data: {},
            success: function (data) {
                $("#tribunalesAsignados").html(data);
            }
        });
    }
}
function showAlertDanger(title, message) {
    $.notify({
            title: title,
            message: message,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        },
        {
            type: 'danger',
            delay: 5000,
        });
}
function ajaxRequestGeneric(url, dataSend) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url,
        enctype: 'multipart/form-data',
        data: dataSend,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function (data) {
            loadTribunalesSugestion();
            loadTribunalesAssigned();
        },
        error: function () {

        }
    });

}
function changeTribunalAjax(id, profesionalOldId){

    if ($("#profesionalID" + id).val() != null) {
        var assignIdChange = id;
        var profesionalIdChange = $("#profesionalID" + id).val();
        var descriptionChange = $("#description" + id).val();
        var formDataChange = new FormData();
        formDataChange.append("id", assignIdChange);
        formDataChange.append("profesional_id", profesionalIdChange);
        formDataChange.append("descriptionChange", descriptionChange);
        formDataChange.append("profesionalOldId", profesionalOldId);
        ajaxRequestGeneric("/changetribunal", formDataChange);
    } else {
        showAlertDanger('Selecione un tribunal', 'Selecione un tribunal para realizar el cambio.');
    }
}

function assignTribunalAjax() {
    $(".btn-submit").click(function (e) {
        e.preventDefault();
        var proyecto_id = $("#proyecto_id").val();
        var profesional_id = $("#profesional_id").val();
        if (null == proyecto_id || null == profesional_id) {
            showAlertDanger('Datos incompletos', 'seleccione un proyecto y un profesional...')
            return;
        }
        var formData = new FormData();
        formData.append("proyecto_id", proyecto_id);
        formData.append("profesional_id", profesional_id);

        ajaxRequestGeneric("/asignacionpost", formData);
    });
}

$(document).ready(function () {
    loadTribunalesSugestion();
    loadTribunalesAssigned();
    $('#proyecto_id').change(function () {
        loadTribunalesSugestion();
        loadTribunalesAssigned()
    });
    assignTribunalAjax();

    $(".reveal").on('click',function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
});