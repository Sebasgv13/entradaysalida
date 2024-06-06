
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

body {
  font-family: var(--font-inter), sans-serif;
  text-align: center;
}


h1 {
  font-family: var(--font-inter), sans-serif;
}

form {
    display: inline-block;
    vertical-align: middle;
    
}

button {
  background-color: #fff; /* Blue */
  color: black; /* Text color */
  border: 2px solid black;
  padding: 10px 20px;
  border-radius: 5px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;

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
