<!DOCTYPE html>
<html lang="es">
   <head>
      <title></title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/login.css" rel="stylesheet">
   </head>
   <body>
      <form id="login" method="post" action="login.php">
         <div>
            <h1>Administrator only</h1>
            <p>Inicio de sesión para administradores</p>
         </div>
         <div id="login-inputs">
            <input name="user_identifier" type="text" placeholder=" Email o nombre de usuario">  
            <input name="user_identifier" type="password" placeholder=" Contraseña">  
         </div>
         <div id="buttons">
            <input type="submit" value="Login">
            <button type="button" onclick="location.href='/index.php'">Volver</button>
         </div>
      </form> 
   </body>
</html>
