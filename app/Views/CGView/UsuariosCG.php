<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Personal CG</title>
</head>

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
            margin-bottom: 50px;
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
            width: 100%;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(100, 100, 100);
            border-color: #d35e13;
            outline: none;
            box-sizing: border-box;
            font-size: 13px;
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

        .btn {
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

        /* Media query for screens smaller than 768px */
@media only screen and (max-width: 768px) {

/* Increase font size for title */
.titleuser {
  font-size: 30px;
}

/* Increase table font size */
th, td {
  font-size: 14px;
}

/* Adjust image width */
.img_home img {
  width: 200px;
}

/* Stack buttons vertically */
.buscar_registro,
.btnagregar_empleado,
.btnregreso {
  display: block;
  margin: 10px auto;
}

/* Remove margin from regresar button */
.btnregreso {
  margin-left: 0;
}

/* Adjust table width */
table {
  width: 100%;
}
}


    </style>


<body>

<a href="http://192.168.0.203:8080/central">
    <img src="assets-app\images\logoCG.png" alt="">
  </a>

    <div class="bannerhome">
        <div class="img_home">
            <img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.jpeg" alt="">
        </div>
    </div>

    <h1 class="titleuser">PERSONAL CENTRAL GANADERA</h1>

    <form method="POST" action="Buscar" class="buscar_registro">
        <input type="text" name="query" placeholder="Buscar por Cédula, Nombre, Área o Código." class="buscador_usuarios">
        <button type="submit" class="btnbuscar">Buscar</button>
    </form>

    <form action="/central/agregarEmpleado" method="POST" class="btnagregar_empleado">
        <button type="submit">Agregar</button>
    </form>

    <form action="/central/UsuariosCG" method="POST" class="btnregreso">
        <button type="submit">Regresar</button>
    </form>
    
    <!-- Agrega este bloque PHP para mostrar los datos -->
<?php if(isset($cedula, $nombre, $area, $codigo, $estado)): ?>
    <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: #86a315; font-weight: bold;">
        Datos que estás enviando:
        <ul>
            <li>Cédula: <?= $cedula ?></li>
            <li>Nombre: <?= $nombre ?></li>
            <li>Área: <?= $area ?></li>
            <li>Código: <?= $codigo ?></li>
            <li>Estado: <?= $estado ?></li>
        </ul>
    </div>
<?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: #86a315; font-weight: bold;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>CÉDULA</th>
                <th>NOMBRE</th>
                <th>ÁREA</th>
                <th>CÓDIGO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro) { ?>
                <tr>
                    <td><?php echo $registro['CEDULA']; ?></td>
                    <td><?php echo $registro['NOMBRE']; ?></td>
                    <td><?php echo $registro['AREA']; ?></td>
                    <td><?php echo $registro['CODIGO']; ?></td>
                    <td><?php echo $registro['ESTADO']; ?></td>
                    <td>
    <a class="btn" href="<?php echo base_url('editar/' . $registro['CEDULA']); ?>" class="btneditar">Editar</a>
</td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
                
</html>
