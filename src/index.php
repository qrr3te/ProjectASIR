<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alameda Motor</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <?php include ("includes/header.php"); ?>
  <section class="hero-section">
    <div class="hero-content">
      <h1>ALAMEDA MOTOR</h1>
      <p>
        Somos profesionales con muchos años de experiencia en el sector y
        sistemáticamente formados en las más novedosas tecnologías lo cual nos permite garantizarle,
        la resolución de cualquier intervención sobre su vehículo de la manera más profesional.
      </p>
      <a href="#contacto" class="hero-button">CONTÁCTANOS</a>
    </div>
    <div class="hero-image">
      <img src="img/alamedamotor" alt="alamedamotor">
    </div>
  </section>

  <section class="services-section">
    <div class="services-header">
      <h2>SERVICIOS</h2>
      <p>Ofrecemos una amplia gama de servicios para mantener tu vehículo en óptimas condiciones.</p>
    </div>
    <div class="services-container">
      <div class="service-item">
        <i class="fas fa-tools"></i>
        <h3>Mantenimiento</h3>
        <p>Revisiones completas para prevenir fallos.</p>
      </div>
      <div class="service-item">
        <i class="fas fa-oil-can"></i>
        <h3>Cambio de Aceite</h3>
        <p>Usamos aceites de alta calidad para el motor.</p>
      </div>
      <div class="service-item">
        <i class="fas fa-car-crash"></i>
        <h3>Reparación</h3>
        <p>Solucionamos cualquier problema mecánico.</p>
      </div>
      <div class="service-item">
        <i class="fas fa-laptop-code"></i>
        <h3>Diagnóstico</h3>
        <p>Detectamos problemas con herramientas avanzadas.</p>
      </div>
    </div>
    <div class="services-button">
      <button>Conoce Más</button>
    </div>
  </section>

  <section class="web-elements">
    <div class="text-content">
      <h4>About</h4>
      <div class="title-with-line">
        <h1>Nuestras<br>Gasolineras</h1>
        <div class="horizontal-line"></div>
      </div>
      <p>Contamos con varias gasolineras de la mejor calidad, donde puede encontrar productos de todo tipo.</p>
      <button class="read-more">Conoce Más</button>
    </div>
    <div class="image-content">
      <div class="image-circle">
        <img src="img/gasolinera.jpg" alt="Gasolineras">
      </div>
    </div>
  </section>

  <section class="cta-header">
    <h2>Citas y Presupuestos</h2>
  </section>
  <section class="cta-section">
    <div class="cta-card">
      <h3>Pedir Cita Previa</h3>
      <p>Programa tu visita con nosotros y evita esperas innecesarias.</p>
      <button onclick="window.location.href='#cita-form'">Pedir Cita</button>
    </div>
  </section>

  <footer class="footer">
    <div class="bottom-bar">
      <div class="contact-info">
        <span>Lun - Mar: 09:00am a 060:0pm</span>
        <span> | </span>
        <span>+34 123456789</span>
        <span> | </span>
        <span>support@alamedamotor.com</span>
      </div>
      <div class="social-icons">
      </div>
      <div class="social-icons">
        <a href="https://x.com/alamedamotor"><i class="fab fa-twitter"></i></a>
        <a href="https://www.facebook.com/talleresalamedamotor/?locale=es_ES"><i class="fab fa-facebook"></i></a>
        <a href="https://www.linkedin.com/company/a1-engine"><i class="fab fa-linkedin"></i></a>
        <a href="https://www.instagram.com/alamedamotors23/"><i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com/@cochesnet"><i class="fab fa-youtube"></i></a>
      </div>
      </div>
    </div>
    <div class="copyright">
      <p>&copy; 2024 Alameda Motor. Todos los derechos reservados.</p>
    </div>
    <div class="legal-links">
    <a href="/terminos.php">Términos y Condiciones</a>
      <span>|</span>
      <a href="/cookies.php">Política de cookies</a>
    </div>
  </footer>
  </footer>
</body>

</html>
