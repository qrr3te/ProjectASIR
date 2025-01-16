<?php
function login() {
   $user_identifier = $_POST['user_identifier'] ?? '';
   $password = $_POST['password'] ?? '';

   if (empty($user_identifier) && empty($password)) {
      die();
   }

   require("../includes/connect.php");

   $stmt = $conn->prepare("SELECT username,password FROM admin WHERE username = ? OR email = ?");
   $stmt->bind_param("ss", $user_identifier, $user_identifier);
   $db_username = "";
   $db_password = "";
   $stmt->bind_result($db_username, $db_password);

   $stmt->execute();
   $stmt->fetch();

   if (empty($password)) {
      die();
   }

   if (password_verify($password, $db_password)) {
      $_SESSION["user_id"] = $db_username;
      $_SESSION["admin_status"] = true;
      $_SESSION["logged_in"] = true;
      header("Location: index.php");
      die();
   } else {
      echo "<p style='color: red; text-align: center;'>Contraseña incorrecta. Intente nuevamente.</p>";
   }
   $stmt->close(); 

   die();
}


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   login();
}

?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Login Administrador</title>
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
            <input name="password" type="password" placeholder=" Contraseña">  
         </div>
         <div id="buttons">
            <input type="submit" value="Login">
            <button type="button" onclick="location.href='/index.php'">Volver</button>
         </div>
      </form> 
   </body>
</html>
