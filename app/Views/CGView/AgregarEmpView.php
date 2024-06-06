<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Personal CG</title>

    <style>
        body {
            font-family: 'Montserrat';
            margin: 0;
            width: 100%;
            background-image: url('http://192.168.0.203:8080/central/assets-app/images/fondo.png');
        }

        .formulario {
            text-align: center;
            margin: 0 auto;
            width: 50%;
        }

        img {
            width: 400px;
            margin-left: 60px;
        }

        .titleuser {
            text-align: center;
            color: #d35e13;
            font-weight: 800;
            font-family: 'Montserrat';
            font-size: 45px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th,
        td {
            border-top: 1px solid transparent;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #1770b7;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .buscar_registro {
            max-width: 305px;
            margin: 0 auto;
            text-align: center;
            padding-top: 100px;
        }

        input[type="text"],
        button {
            text-align: center;
            font-family: 'Montserrat';
            font-weight: 900;
            width: 200px;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(100, 100, 100);
            border-color: #d35e13;
            outline: none;
            box-sizing: border-box;
            font-size: 20px;
            color: #d35e13;
        }

        input::placeholder {
            transition: opacity 0.1s linear;
            color: #d35e13;
        }

        input:focus::placeholder {
            opacity: 0;
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
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        button:hover {
            background-color: #86a315;
        }

        a {
            border-radius: 8px;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            display: inline-block;
            text-decoration: none;
            background-color: #86a315;
        }

        .btneditar {
            border-radius: 8px;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            display: inline-block;
            text-decoration: none;
            background-color: #d35e13;
        }

        .btnbuscar {
            border-radius: 8px;
            padding: 5px 10px;
            width: 200px;
            margin: 0 auto;
            background-color: #86a315;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        .btnregreso {
            margin-left: 170px;
            border-radius: 8px;
            width: 150px;
            background-color: #86a315;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        .btnagregar_empleado {
            float: right;
            margin-right: 170px;
            border-radius: 8px;
            width: 150px;
            background-color: #86a315;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        hr {
            width: 80%;
        }

        select {
            text-align: center;
            font-family: 'Montserrat';
            font-weight: 900;
            width: 250px;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(100, 100, 100);
            border-color: #d35e13;
            outline: none;
            box-sizing: border-box;
            font-size: 20px;
            color: #d35e13;
        }

        select option {
            font-size: 14px;
            color: #000;
        }

        select option:hover {
            background-color: red;
        }
    </style>
</head>

<body>

    <div class="bannerhome">
        <div class="img_home">
            <img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.jpeg" alt="">
        </div>
    </div>

    <h1 class="titleuser">AGREGAR EMPLEADO</h1>
    <hr>
    <form action="/central/UsuariosCG" method="POST" class="btnregreso">
        <button type="submit">Regresar</button>
    </form>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: #86a315; font-weight: bold;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="/central/guardarEmpleado" method="POST" class="formulario">
        <!-- Cambio en la acción del formulario -->
        <input type="text" name="cedula" placeholder="Cedula" required>
        <input type="text" name="nombre" placeholder="Nombre" required>

        <select name="Area" id="area" direction="down">
            <option value=""></option>
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

        <input type="text" name="codigo" placeholder="Codigo" required>

        <select name="Estado" direction="down">
            <option value="1">Estado</option>
            <option value="ACTIVO">ACTIVO</option>
            <option value="RETIRADO">RETIRADO</option>
            <option value="VACACIONES">VACACIONES</option>
            <option value="SUSPENDIDO">SUSPENDIDO</option>
            <option value="INCAPACITADO">INCAPACITADO</option>
        </select>
        <br>
        <br>
        <button type="submit">Agregar</button>
    </form>

</body>

</html>
