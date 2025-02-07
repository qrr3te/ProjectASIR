 <!-- Favicon -->
 <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
 

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/Logo Vectorizado.png" alt="AlamedaMotors Logo" class="brand-logo" style="height: 40px;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Inicio</a>
                <a href="presupuesto.php" class="nav-item nav-link">Cita Previa</a>
                <a href="vehiculos.php" class="nav-item nav-link">Vehículos</a>
                <a href="conocenos.php" class="nav-item nav-link">Nosotros</a>
                <a href="servicios.php" class="nav-item nav-link">Servicios</a>
                <div class="nav-item dropdown">
                </div>
                <a href="contact.html" class="nav-item nav-link">Contacto</a>
            </div>
            <!-- Iconos adicionales -->
            <div class="d-flex align-items-center me-4">
                <!-- Icono de usuario -->
                <a href="login.html" class="nav-link">
                    <i class="fa fa-user text-primary fa-lg"></i>
                </a>

<<<<<<< HEAD
   .whatsapp-btn {
    background-color: #ff7300;
    color: #fff;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none; 
    display: inline-block; 
}

.whatsapp-btn:hover {
    background-color: #e65c00; 
}
   .icons {
       display: flex;
       gap: 10px;
       margin-top: 10px;
   }

   .icons i:hover {
       color: #ff7300;
   }

   /* Media Queries */
   @media (max-width: 576px) {
       .main-header {
           display: none;
       }
       .logo img {
           width: 300px;   
           height: auto;
       }
   }
   @media (min-width: 576px) {
       .main-header {
           flex-direction: row;
           justify-content: space-between;
       }

       .nav-menu {
           flex-direction: row;
           gap: 15px;
           margin-top: 0;
       }

       .header-right {
           flex-direction: row;
           gap: 15px;
       }

       .about-us .container {
           max-width: 540px;
           text-align: center;
       }

       .footer {
           max-width: 100%;
       }
       .main-header2 {
           display: none;
       }
   }

   @media (min-width: 768px) {

       .nav-menu a {
           font-size: 16px;
       }

       .whatsapp-btn {
           padding: 12px 25px;
           font-size: 16px;
       }

       .about-us h2 {
           font-size: 26px;
       }

       .about-us p {
           font-size: 16px;
       }

       .footer .social-icons a {
           font-size: 16px;
       }

       .hero-image {
           height: 400px;
       }

       .liderazgo .content {
           flex-direction: row;
           gap: 40px;
       }

       .liderazgo .text {
           flex: 1;
       }

       .liderazgo .images {
           flex: 1;
       }
       .main-header2 {
           display: none;
       }
   }

   @media (min-width: 992px) {
       .main-header {
           padding: 20px 40px;
       }

       .nav-menu {
           gap: 20px;
       }

       .about-us .container {
           max-width: 1500px;
       }
       .main-header2 {
           display: none;
       }
   }

   @media (min-width: 1366px) {
       .logo img {
           width: 300px;
           height: auto;
       }
       .about-us .container {
           max-width: 100%;
       }

       .about-us p {
           color: #666;
           line-height: 1.6;
           font-size: 25px;
       }
       .main-header2 {
           display: none;
       }
       .nav-menu a {
           font-size: 20px;
       }
       .nav-menu {
           display: flex;
           flex-direction: row;
           gap: 70px;
           margin-top: 20px;
       }
   }

   /* Estilo del Accordion */
   .accordion {
       margin-top: 20px;
       border: 1px solid #ddd;
       border-radius: 8px;
       overflow: hidden;
   }

   .accordion-item {
       border-bottom: 1px solid #ddd;
   }

   .accordion-item:last-child {
       border-bottom: none;
   }

   .accordion-header {
       width: 100%;
       padding: 15px 20px;
       text-align: left;
       font-size: 16px;
       background-color: #f7f7f7;
       border: none;
       outline: none;
       cursor: pointer;
       transition: background-color 0.3s ease;
   }

   .accordion-header:hover {
       background-color: #e6e6e6;
   }

   .accordion-content {
       max-height: 0;
       overflow: hidden;
       transition: max-height 0.3s ease-out;
       padding: 0 20px;
       font-size: 14px;
       color: #333;
   }

   .accordion-content p {
       margin: 15px 0;
   }

   /* Mostrar contenido expandido */
   .accordion-item.active .accordion-content {
       max-height: 150px;
       
   }

   .accordion-item.active .accordion-header {
       font-weight: bold;
       background-color: #ff7300;
       color: #fff;
   }

   /* Responsive Design */
   @media (max-width: 768px) {
     .nav-menu {
       display: none;
     }

     .header-right {
       flex-direction: column;
       gap: 10px;
     }

     .main-header {
       flex-direction: column;
       align-items: flex-start;
     }

     .hero-section {
       flex-direction: column;
       text-align: center;
       height: auto;
       padding: 20px;
     }

     .hero-content {
       max-width: 100%;
       margin-bottom: 20px;
     }

     .hero-image img {
       max-width: 90%;
     }

     .cta-card {
       width: 100%;
     }

     .cta-section {
       flex-direction: column;
       align-items: center;
       gap: 20px;
     }
   }
</style>

<header>
  <section class="main-header">
    <a href="index.html">
      <div class="logo"><img src="img/logo.png" alt="">
      </div>
    </a>
      <nav class="nav-menu">
          <a href="/index.php">Inicio</a>
          <a href="/servicios.php">Servicios</a>
          <a href="/presupuesto.php">Solicitar Cita</a>
          <a href="#">Vehículos</a>
          <a href="/conocenos.php">Conócenos</a>
          <a href="/contacto.php">Contacto</a>
      </nav>
      <div class="header-right">
        <a href="https://wa.me/633487862?text=hola" class="whatsapp-btn" target="_blank">Contacta por WhatsApp</a>
        <div class="icons">
        <i class="fas fa-search"></i>
        <i class="fas fa-user"></i>
    </div>
</div>
      </div>
  </section>

  <section class="main-header2">
      <div class="logo">
          <img src="img/Logo Vectorizado.png" alt="">
      </div>
      <div class="accordion">
          <!-- Sección Inicio -->
          <div class="accordion-item">
              <button class="accordion-header" data-url="index.html">Inicio</button>
              <div class="accordion-content">
                  <p>Explora nuestra página de inicio para descubrir más sobre Alameda Industrial y nuestros
                      servicios.</p>
              </div>
          </div>

          <!-- Sección Servicios -->
          <div class="accordion-item">
              <button class="accordion-header">Servicios</button>
              <div class="accordion-content">
                  <p>Conoce los servicios que ofrecemos, desde reparación de vehículos hasta suministro de
                      combustibles.</p>
              </div>
          </div>

          <!-- Sección Solicitar Presupuesto -->
          <div class="accordion-item">
              <button class="accordion-header">Solicitar Presupuesto</button>
              <div class="accordion-content">
                  <p>Solicita un presupuesto personalizado según tus necesidades. ¡Estamos aquí para ayudarte!</p>
              </div>
          </div>

          <!-- Sección Vehículos -->
          <div class="accordion-item">
              <button class="accordion-header">Vehículos</button>
              <div class="accordion-content">
                  <p>Descubre nuestra flota de vehículos y las opciones disponibles para transporte y servicios.
                  </p>
              </div>
          </div>

          <!-- Sección Conócenos -->
          <div class="accordion-item">
              <button class="accordion-header">Conócenos</button>
              <div class="accordion-content">
                  <p>Conoce más sobre Alameda Industrial, nuestra historia, misión y visión como empresa líder.
                  </p>
              </div>
          </div>

          <!-- Sección Contacto -->
          <div class="accordion-item">
              <button class="accordion-header">Contacto</button>
              <div class="accordion-content">
                  <p>Contáctanos por WhatsApp o a través de nuestras redes sociales para obtener más información.
                  </p>
              </div>
          </div>
      </div>
  </section>
  <script>
      document.querySelectorAll('.accordion-header').forEach(button => {
          const accordionItem = button.parentElement;

          // Mostrar información al pasar el ratón por encima
          button.addEventListener('mouseover', () => {
              // Cerrar cualquier otro accordion abierto
              const openItem = document.querySelector('.accordion-item.active');
              if (openItem && openItem !== accordionItem) {
                  openItem.classList.remove('active');
              }

              // Abrir el contenido del acordeón actual
              accordionItem.classList.add('active');
          });

          // Redirigir al hacer clic
          button.addEventListener('click', () => {
              const url = button.getAttribute('data-url');
              if (url) {
                  window.location.href = url; // Redirigir a la URL especificada
              }
          });
      });


  </script>
</header>
=======
                <!-- Icono de carrito -->
                <a href="carrito.html" class="nav-link position-relative">
                    <i class="fa fa-shopping-cart text-primary fa-lg"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                    <!-- Número de artículos en el carrito -->
                </a>
            </div>

            <!-- Botón de contacto -->
            <a href="contact.html" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Contacta<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
     <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
>>>>>>> main

    <!-- Template Javascript -->
    <script src="js/main.js"></script>