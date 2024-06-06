<!-- editarEmpleado.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Editar Empleado</title>
    <!-- Agrega los estilos necesarios, similar a tu vista principal -->
</head>

<body>
    <div>
        <img src="http://192.168.0.203:8080/central/assets-app/images/logoCG.png" alt="">
    </div>
        <h1>Editando el empleado</h1>
        <?php if ($empleado): ?>
            <form action="/central/guardarEdicion" method="POST">
                <!-- Campos del formulario con los detalles del empleado -->
                <input type="text" name="cedula" value="<?= $empleado['CEDULA']; ?>" readonly>
                <input type="text" name="nombre" value="<?= $empleado['NOMBRE']; ?>">
                <input type="text" name="area" value="<?= $empleado['AREA']; ?>">
                <input type="text" name="codigo" value="<?= $empleado['CODIGO']; ?>">
                <input type="text" name="estado" value="<?= $empleado['ESTADO']; ?>">
                <br>
                <br>
                <button type="submit">Guardar Cambios</button>
            </form>
        <?php else: ?>
            <p>No se encontró al empleado.</p>
        <?php endif; ?>

        <!-- Puedes agregar un enlace para regresar a la lista de empleados -->
        <a href="/central/CGView/loginCG/UsuariosCG">Regresar</a>
    <!-- Agrega los scripts necesarios, similar a tu vista principal -->
</body>

    <style>
        body {
            font-family: 'Montserrat';
            margin: 0;
            width: 100%;
            background-image:url('http://192.168.0.203:8080/central/assets-app/images/fondo.png');
        }

        img {
            width: 400px;
            margin-left: 60px;
        }

        h1 {
            text-align: center;
            color: #d35e13;
            font-weight: 800;
            font-family: 'Montserrat';
            font-size: 45px; 
        }

        form {
            background-color: #fff;
            width: 500px;
            margin: 0 auto;
            border: none;
            
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            text-align: center;
            font-family: 'Montserrat';
            font-weight: 900;
            width: 60%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 2px solid rgb(70,70,70);
            outline:none;
            box-sizing: border-box;
            font-size: 17px;
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

    </style>
    
</html>
