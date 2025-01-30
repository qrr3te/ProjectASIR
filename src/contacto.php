<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alameda Motor</title>
  <link rel="stylesheet" href="EstiloContacto.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <?php include("includes/header.php"); ?>

  <div class="container">
    <div class="form-box">
      <h2>Formulario de Contacto</h2>
      <form action="https://formsubmit.co/gokudester@gmail.com" method="POST" >
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Correo electronico</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Asunto</label>
        <input type="tel" id="phone" name="phone" required>
        
        <label for="name">Comentarios</label>
        <input type="name" id="name" name="name" required>

        <button type="submit">Contactar</button>

        <input type="hidden" name="_next" value="http://localhost:8000/contacto.php#">

        <input type="hidden" name="_captcha" value="false">
        
      </form>
    </div>
  </div>

  <?php include("includes/footer.php"); ?>
</body>
</html>
