
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
   
    <h1>LOGIN</h1>

    <form action="/central/mostrarFormularioRegistro" method="POST" class ="btnregreso">
        <button type="submit">Registrar</button>
    </form>
    <form action="/central/UsuariosCG" method="POST" class ="btnregreso">
        <button type="submit">Usuarios</button>
    </form>   
    <form action="/central/Reportes" method="POST" class ="btnregreso">
        <button type="submit">Reportes</button>
    </form> 
    <form action="/central/Registros" method="POST" class ="btnregreso">
        <button type="submit">Registros</button>
    </form>
    <form action="/central/PruebaUsuariosCG" method="POST" class ="btnregreso">
        <button type="submit">Usuarios del sistema</button>
    </form>
    <form action="/central/mostrarFormulario" method="POST" class ="btnregreso">
        <button type="submit">Info Registros</button>
    </form>

</body>



<style>
             /* Estilos opcionales para mejorar la apariencia */
/* body {
  background-image: url('assets-app/images/fondo_admin.jpg');
  background-size: cover;
  background-repeat: no-repeat;
} */

body {
  font-family: var(--font-inter), sans-serif;
  text-align: center;
}

img {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
}

button:hover {
  background-color: #86a315; /* Darker blue on hover */
}

button:focus {
  outline: none; /* Remove default outline */
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Stronger shadow on focus */
}

</style>
</html>
