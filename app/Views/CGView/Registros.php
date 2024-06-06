<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Información de la tabla</title>

    <style>
        body {
            font-family: 'Montserrat';
            margin: 0;
            background-image:url('http://192.168.0.203:8080/central/assets-app/images/fondo.png');
            background-size: cover;
        }

        .img_home {
            width: 80%;
            margin-top: -35px;
        }

        img {
            width: 250px;
        }

        .titleuser {
            text-align: center;
            color: #d35e13;
            font-weight: 800;
            font-family: 'Montserrat';
            font-size: 35px;
            margin-top: -140px;
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
        }

        input[type="text"],
        button {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #86a315;
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

        .btn-primary_1 {
            border-radius: 8px;
            padding: 5px 10px;
            width: 150px;
            margin: 0 auto;
            background-color: #86a315;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        .btn-primary_2:hover {
            background: #86a315;
        }

        .btn-primary_2 {
            border-radius: 8px;
            padding: 5px 10px;
            width: 150px;
            margin: 0 auto;
            margin-top: 10px;
            background-color: #d35e13;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            font-family: 'Montserrat';
        }

        .btn-primary_2:hover {
            background: #d35e13;
        }

        img {
            width: 400px;
            margin-bottom: 40px;
            margin-top: 50px;
        }

        input[type="number"] {
            text-align: center;
            font-family: 'Montserrat';
            font-weight: 900;
            width: 80%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(70, 70, 70);
            outline: none;
            box-sizing: border-box;
            font-size: 17px;
        }

        input::placeholder {
            transition: opacity 0.1s linear;
            color: #d35e13;
        }

        input:focus::placeholder {
            opacity: 0;
        }

        .home {
            width: 125px;
            margin-left: 120px;
            margin-bottom: 0;
        }

    </style>
</head>

<body>
    <a href="http://192.168.0.203:8080/central/admin">
        <img src="assets-app\images\logoCG.png" alt="">
    </a>
    <form method="POST" action="Buscar2" class="buscar_registro">
        <input type="number" name="query" placeholder="Buscar por Codigo" class="buscador_usuarios" required>
        <button type="submit" class="btnbuscar">Buscar</button>
    </Form>

    <a href="http://192.168.0.203:8080/central/Registros">
        <img class="home" src="assets-app\images\home.png" alt="">
    </a>

    <table>
        <thead>
            <tr>
                <th>ID_INGRESO</th>
                <th>NOMBRE</th>
                <th>AREA</th>
                <th>CODIGO</th>
                <th>FECHA_INGRESO</th>
                <th>FECHA_SALIDA</th>
            </tr>
        </thead>

        <tbody>
            <?php if (isset($registros['REGISTROS']) && !empty($registros['REGISTROS'])) : ?>
                <?php foreach ($registros['REGISTROS'] as $registro) : ?>
                    <tr>
                        <td><?php echo isset($registro['ID_INGRESO']) ? $registro['ID_INGRESO'] : ''; ?></td>
                        <td><?php echo isset($registro['NOMBRE']) ? $registro['NOMBRE'] : ''; ?></td>
                        <td><?php echo isset($registro['AREA']) ? $registro['AREA'] : ''; ?></td>
                        <td><?php echo isset($registro['CODIGO']) ? $registro['CODIGO'] : ''; ?></td>
                        <td><?php echo isset($registro['FECHA_INGRESO']) ? $registro['FECHA_INGRESO'] : ''; ?></td>
                        <td><?php echo isset($registro['FECHA_SALIDA']) ? $registro['FECHA_SALIDA'] : ''; ?></td>

                        <td>
                            <?php if (empty($registro['FECHA_INGRESO']) && empty($registro['FECHA_SALIDA'])) : ?>
                                <form class="btn_ingreso" action="<?php echo base_url('registrarIngreso/' . $registro['CODIGO']); ?>" method="POST">
                                    <button class="btn btn-primary_1">INGRESO</button>
                                </form>
                            <?php endif; ?>

                            <?php if (empty($registro['FECHA_INGRESO']) && !empty($registro['FECHA_SALIDA'])) : ?>
                                <form class="btn_ingreso" action="<?php echo base_url('registrarIngreso/' . $registro['CODIGO']); ?>" method="POST">
                                    <button class="btn btn-primary_1">INGRESO</button>
                                </form>
                            <?php endif; ?>

                            <?php if (!empty($registro['FECHA_INGRESO']) && empty($registro['FECHA_SALIDA'])) : ?>
                                <form class="btn_salida" action="<?php echo base_url('registrarSalida/' . $registro['CODIGO']); ?>" method="POST">
                                    <button class="btn btn-primary_2">SALIDA</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">No se encontraron registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>
