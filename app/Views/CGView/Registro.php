<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="shortcut icon" href="assets-app\images\favicon.ico" type="image/x-icon">
  <title>Registro de Usuario</title>

  <style>

    /* Nuevos estilos para el formulario de registro */
    body {
      font-family: 'Montserrat';
      margin: 0;
      padding: 0;
      text-align: center;
      background-image:url('http://192.168.0.203:8080/central/assets-app/images/fondo.png');
      background-size: cover;
        }

    form {
      background-color: #fff;
      width: 500px;
      margin: 0 auto;
      border: none;
      
    }


    img {
      width: 400px;
      margin-bottom: 40px;
      margin-top: 50px;
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

    select {
      text-align: center;
      font-family: 'Montserrat';
      font-weight: 900;
      padding: 10px;
      margin-top: 20px;
      margin-bottom: 20px;
      border: none;
      border-bottom: 2px solid rgb(70,70,70);
      
      outline:none;
      box-sizing: border-box;
      font-size: 17px;
      
    }

    input[type="submit"] {
      background-color:#d35e13;
	    border-radius:28px;
	    display:inline-block;
	    color:#ffffff;
	    font-size:17px;
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

    /* Media query for screens smaller than 768px */
@media only screen and (max-width: 768px) {

/* Increase font size for inputs, select, and submit button */
input[type="text"],
input[type="password"],
input[type="submit"],
select {
  font-size: 15px;
}

/* Adjust image width */
img {
  width: 250px;
}

/* Adjust form width */
form {
  width: 80%;
}
}


  </style>
</head>
<body>
  <a href="http://192.168.0.203:8080/central/admin">
    <img src="assets-app\images\logoCG.png" alt="">
  </a>

  <form action="/central/registrarUsuario" method="POST" class="formulario"> 
    <input type="text" id="nombre" name="nombre" placeholder="NOMBRE" required>
    <input type="text" id="nusuario" name="nusuario" placeholder="NOMBRE DE USUARIO" required>
    <input type="password" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" required>
    <br>
    <select name="tipo_usuario" id="tipo_usuario">
      <option value= 1>1 - INGRESOS</option>
      <option value= 2>2 - ADMINISTRACIÓN</option>
      <option value= 3>3 - REPORTES</option>
      <option value= 4>4 - SUPERADMIN</option>
      <option value= 5>5 - ADMIN-CG</option>
  </select>
  
  <br>
    <input type="submit" value="REGISTRAR">
  </form>

  <?php if (session()->getFlashdata('success')): ?>
        <div style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: #86a315; font-weight: bold;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

  
</body>
</html>
