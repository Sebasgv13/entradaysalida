<!DOCTYPE html>
<html lang="en">

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Usuarios Registrados</title>

    <style>

        body {
            font-family: 'Montserrat';
            margin: 0;
            background-image:url('http://192.168.0.203:8080/central/assets-app/images/fondo.jpg');
            background-size: cover;
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

        button {
            color: white;
            border: none;
            width: 200px;
            margin: 0 auto;
            font-size: 20px;
            font-family: 'Montserrat';
            border-radius: 8px;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            display: inline-block;
            text-decoration: none;
            background-color: #d35e13;
            display: flow;
            
        }

        .btn_cerrarsesion {
           width: 100%;
        }

        .error-message {
            margin-top: 10px;
            margin-bottom: 10px;
            color: #d35e13;
            font-weight: bold;
        }

        .success-message {
            margin-top: 10px;
            margin-bottom: 10px;
            color: #86a315;
            font-weight: bold;
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
        <h1>Usuarios Registrados</h1>

        <?php if (session()->getFlashdata('error_login')) : ?>
            <div class="error-message">
                <?= session()->getFlashdata('error_login') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="success-message">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <table border="1">
            <thead>
                <tr>

                    <th>Nombre</th>
                    <th>Nombre de Usuario</th>
                    <th>Tipo de Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>

                        <td><?= $usuario['NOMBRE'] ?></td>
                        <td><?= $usuario['NUSUARIO'] ?></td>
                        <td><?= $usuario['TIPO_USUARIO'] ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <!--  
            <form class="btn_cerrarsesion" action="/central/loginCG" method="POST" class="btnregreso">
                <button type="submit">Cerrar Sesión</button>
            </form>
        -->

        
</body>

</html>