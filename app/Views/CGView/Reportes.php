<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Informe de Horas Trabajadas</title>
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

        input[type="int"],
        input[type="date"],
        input[type="submit"] {
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
        input[type="int"],
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

<a href="http://192.168.0.203:8080/central/admin">
    <img src="assets-app\images\logoCG.png" alt="">
  </a>

<div class="bannerhome">
        <div class="img_home">
            <img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.jpeg" alt="">
        </div>
</div>
    <h2>INFORME DE HORAS</h2>

   
    <form id="formInforme" action="/central/generarInforme" method="POST">
        <label for="Cedula">CEDULA:</label>
        <input type="int" name="Cedula">

        <select name="Area" id="area" direction="down">
            <option value="">Seleccionar Área</option>
            <option value="PIELES">PIELES</option>
            <option value="BOVINOS">BOVINOS</option>
            <option value="PORCINOS">PORCINOS</option>
            <option value="CALLERA">CALLERA</option>
            <option value="HIGIENE">HIGIENE</option>
            <option value="MTTO">MTTO</option>
            <option value="DESARROLLO SOSTENIBLE">DESARROLLO SOSTENIBLE</option>
            <option value="COMPOSTAJE">COMPOSTAJE</option>
            <option value="ADMINISTRACION">ADMINISTRACION</option>
            <option value="PRODUCCION Y OPERACIONES">PRODUCCION Y OPERACIONES</option>
            <option value="CALIDAD">CALIDAD</option>
            <option value="RENTAS">RENTAS</option>
            <option value="FERIA">FERIA</option>
            <option value="POLEAS">POLEAS</option>
        </select>

        <label for="fechaInicio">FECHA INICIAL:</label>
        <input type="date" name="fechainicio" required>
        <label for="fechaFinal">FECHA FINAL:</label>
        <input type="date" name="fechafinal" required>
        <br><br>
        <button type="submit" class="submit">CONSULTAR</button>
        
    </form>
    <br>
    <br>

    <div class="export">
        <button type="button" id="exportPDF">Exportar a PDF</button>
        <button type="button" id="exportExcel">Exportar a Excel</button>
    </div>

    <!-- Mostrar resultados -->
    <?php if (isset($resultados) && !empty($resultados)): ?>
    <h3>RESULTADOS:</h3>
    <table border="1">

        <tr>
            <th>FECHA INICIO</th>
            <th>FECHA FINAL</th>
            <th>CÉDULA</th>
            <th>NOMBRE</th>
            <th>ÁREA</th>
            <th>HORAS TRABAJADAS</th>
        </tr>
        <?php foreach ($resultados as $resultado): ?>
            <tr>
                <td><?= $resultado->FechaInicio ?></td>
                <td><?= $resultado->FechaFinal ?></td>
                <td><?= $resultado->CEDULA ?></td>
                <td><?= $resultado->NOMBRE ?></td>
                <td><?= $resultado->AREA ?></td>
                <td><?= $resultado->HorasTrabajadas ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
    <h3>NO SE ENCONTRARON RESULTADOS</h3>
    <?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>
<script>
    document.getElementById('exportPDF').addEventListener('click', function() {
        var element = document.querySelector('table');
       
        html2pdf(element, {
            margin: [10, 10, 10, 10], // Ajusta los márgenes como desees
            filename: 'informe_horas.pdf', // Nombre del archivo PDF
            image: { type: 'jpeg', quality: 0.98 }, // Calidad de imagen (opcional)
            html2canvas: { scale: 2 }, // Escala de conversión HTML a PDF (opcional)
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' } // Configuración de PDF (opcional)
            
        });
    });
    

    document.getElementById('exportExcel').addEventListener('click', function() {
        var wb = XLSX.utils.table_to_book(document.querySelector('table'), {sheet: "Informe Horas"});
        var wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'informe_horas.xlsx');
    });

</script> 
</body>
</html>

