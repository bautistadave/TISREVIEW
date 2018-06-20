<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        th {
            background-color: #1069af;
            color: white;
        }

        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
        td {
            color: #5b5659;
        }
    </style>
</head>
<body>
<h2 class="h2 text-center text-primary">Reporte</h2>
<table class="table">
    <tr>
        <th>Numero</th>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Tribunales</th
        <th>Tutor</th>
        <th>Autor</th>
    </tr>
    @foreach($data->proyectoDetalle as $proyecto)
        <tr>
            <td>{{$proyecto->project_number}}</td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->descripcion}}</td>
            <td>
                @foreach($proyecto->proyectoTribunales as $profesional)
                    <span class="badge badge-success">
                        {{$profesional->name}}  {{$profesional->surname}}
                    </span> <br>
                @endforeach
            </td>
            <td>{{$proyecto->tutor_data}}</td>
            <td>{{$proyecto->author}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>