<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Consulta de Registros</title>
    <style>
        body {
            font-family: 'Montserrat';
            margin: 0;
            background-image:url('http://192.168.0.203:8080/central/assets-app/images/fondo.png');
            background-size: cover;
        }

        img {
            width: 400px;
            margin-left: 60px;
        }

        h2 {
            text-align: center;
            color: #d35e13;
            font-weight: 800;
            font-family: 'Montserrat';
            font-size: 45px;
        }

        h3 {
            text-align: center;
            color: #d35e13;
            font-weight: 800;
            font-family: 'Montserrat';
            font-size: 25px;
        }

        form {
            background-color: #fff;
            width: 100%;
            text-align: center;
            border: none;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="date"]
         {
            text-align: center;
            font-family: 'Montserrat';
            font-weight: 900;
            width:160px;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(100,100,100);
            outline:none;
            box-sizing: border-box;
            font-size: 17px;
            color: #d35e13;
        }

        input[type="date"]{
            font-family: 'Montserrat';
            color: #d35e13;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        button {
            background-color: #86a315;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            padding: 5px 10px;
            width: 150px;
            margin: 0 auto;
            font-weight: bold;
            font-size: 15px;
            text-decoration: none;
            font-family: 'Montserrat';
            margin-left: 10px;
        }
        .submit {
            background-color: #86a315;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            padding: 5px 10px;
            width: 150px;
            margin: 0 auto;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        .export {
            margin-left: 150px;
        }


        table {
            width: 80%;
            margin: 0 auto;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th, td {
            border-top: 1px solid transparent;
            padding: 8px;
            text-align: center;
            font-family: 'Montserrat';
        }

        th {
            background-color: #1770b7;
            color:#fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Media query for screens smaller than 768px */
        @media only screen and (max-width: 768px) {

        /* Increase font size for headings, labels, and inputs */
        h2,
        h3,
        label,
        input[type="text"],
        input[type="date"] {
            font-size: 15px;
        }

        /* Adjust image width */
        img {
            width: 250px;
            margin: 0 auto;
        }

        /* Adjust form width */
        form {
            width: 90%;
        }

        /* Adjust table width */
        table {
            width: 100%;
        }
        }



    </style>
</head>
<body>

    <div class="img_home">
        <a href="http://192.168.0.203:8080/central/admin">
            <img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.png" />
        </a>

  </div>

<div>

</div>

<h2>Consulta de Registros</h2>

<!-- Formulario para ingresar fechas -->
<form id="formConsulta" action="/central/mostrarFormulario" method="POST">
    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" required>
    <label for="fecha_inicio">Fecha Inicial:</label>
    <input type="date" name="fecha_inicio" required>
    <label for="fecha_fin">Fecha Final:</label>
    <input type="date" name="fecha_fin" required>
    <br><br>
    <button type="submit" class="submit">Consultar</button>
</form>
<br>
<br>

    <div class="export">
        <button type="button" id="exportPDF">Exportar a PDF</button>
        <button type="button" id="exportExcel">Exportar a Excel</button>
    </div>
    
<!-- Mostrar resultados -->
<?php if (isset($registros) && !empty($registros)): ?>
<h3>Resultados:</h3>
<table border="1">
    <tr>
        <th><img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.png" alt="LogoCG"></th>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Área</th>
        <th>Código</th>
        <th>Fecha de Ingreso</th>
        <th>Fecha de Salida</th>
        <th>Portería Entrada</th>
        <th>Portería Salida</th>
    </tr>
    <?php foreach ($registros as $registro): ?>
        <tr>
            <td><?= $registro->CEDULA ?></td>
            <td><?= $registro->NOMBRE ?></td>
            <td><?= $registro->AREA ?></td>
            <td><?= $registro->CODIGO ?></td>
            <td><?= $registro->FECHA_INGRESO ?></td>
            <td><?= $registro->FECHA_SALIDA ?></td>
            <td><?= $registro->PORTERIA_ENTRAA ?></td>
            <td><?= $registro->PORTERIA_SALIDA ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<h3>No se encontraron registros.</h3>
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
<script>
    document.getElementById('exportPDF').addEventListener('click', function() {
        var element = document.querySelector('table');
        html2pdf(element, {
            margin: [10, 10, 10, 10],
            filename: 'informe_registros.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        });
    });

    document.getElementById('exportExcel').addEventListener('click', function() {
        var wb = XLSX.utils.table_to_book(document.querySelector('table'), {sheet: "Informe Registros"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', type: 'binary'});
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'informe_registros.xlsx');
    });
</script>
</body>
</html>
