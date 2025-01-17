<?php 
session_start();
$admin_status = $_SESSION["admin_status"] ?? false;

if (!$admin_status) {
   header("Location: login.php");
   die();
}
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Administration panel</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <header>
         <div id="mobile">
            <svg id="menu-icon" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.096"></g><g id="SVGRepo_iconCarrier"> <path d="M4 18L20 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M4 12L20 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M4 6L20 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> </g></svg>
         </div>
         <div id="normal">
            <img width="100px" src="../img/Logo Vectorizado.png" id="logo">
            <svg id="home-icon" width="32px" height="32px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0L0 6V8H1V15H4V10H7V15H15V8H16V6L14 4.5V1H11V2.25L8 0ZM9 10H12V13H9V10Z" fill="#ffffff"></path> </g></svg>
         </div>
         <div id="user">
         <p id="username"><?php echo $_SESSION["username"]; ?></p>
            <svg width="32px" height="32px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#ffffff"></path> <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#ffffff"></path> </g></svg>
         </div>
      </header> 
      <nav>
         <div id="nav-inicio">Inicio</div> 
         <div id="nav-clientes">Clientes</div> 
         <div id="nav-citas">Citas</div> 
         <div id="nav-compras">Compras</div> 
         <div id="nav-vehiculos">Vehiculos</div> 
         <div id="nav-carburantes">Carburantes</div> 
      </nav>
      <div id="main-area">
         <div id="inicio">
            <h1>Server's Stats Placeholder</h1>
         </div>
         <div id="clientes">
            <h1>clientes Placeholder</h1>
         </div>
         <div id="citas">
            <h1>Citas Placeholder</h1>
         </div>
         <div id="compras">
            <h1>Compras Placeholder</h1>
         </div>
         <div id="vehiculos">
            <h1>Vehiculos Placeholder</h1>
         </div>
         <div id="carburantes">
            <h1>Carburantes Placeholder</h1>
         </div>
      </div>
      <script src="js/index.js"></script>
   </body>
</html>
