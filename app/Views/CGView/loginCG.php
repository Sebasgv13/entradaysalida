<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
    <title>Central Ganadera</title>
</head>

<body>
    <form action="/central/autenticar" method="POST">
        <img src="assets-app\images\logoCG.png" alt="">
        <input type="text" id="username" name="username" placeholder="NOMBRE DE USUARIO" required>
        <input type="password" id="password" name="password" placeholder="CONTRASEÑA" required>
        <input type="submit" value="INICIAR SESIÓN">
    </form>

    <?php if (isset($error_login)) : ?>
        <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: red; font-weight: bold;">
            <?= $error_login ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: #86a315; font-weight: bold;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

</body>

<style>
    img {
        width: 400px;
        margin-bottom: 40px;
    }

    body {
        font-family: 'Montserrat';
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        width: 500px;
        text-align: center;
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
        margin-top: 30px;
        margin-bottom: 20px;
        border: none;
        border-bottom: 2px solid rgb(100, 100, 100);
        outline: none;
        box-sizing: border-box;
        font-size: 17px;
    }

    input[type="submit"] {
        background-color: #d35e13;
        border-radius: 28px;
        display: inline-block;
        color: #ffffff;
        font-size: 17px;
        font-weight: 500;
        width: 50%;
    }

    input[type="submit"]:hover {
        cursor: pointer;
    }

    input::placeholder {
        transition: opacity 0.1s linear;
    }

    input:focus::placeholder {
        opacity: 0;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var confirmarReenvio = document.querySelector("#confirmar-reenvio");
        if (confirmarReenvio) {
            confirmarReenvio.remove();
        }
    });
</script>

</html>
