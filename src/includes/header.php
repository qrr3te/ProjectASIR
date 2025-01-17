<style>
   .main-header {
       display: flex;
       flex-direction: column;
       align-items: center;
       text-align: center;
       padding: 20px;
       background-color: #fff;
       border-bottom: 1px solid #000;
   }

   .main-header2 {
       display: flex;
       flex-direction: column;
       align-items: center;
       text-align: center;
       padding: 20px;
       background-color: #fff;
       border-bottom: 1px solid #000;
   }
   .logo img {
       width: 200px;
       height: auto;
   }
   .logo h1 {
       color: #ff7300;
       font-size: 20px;
   }

   .logo p {
       color: #666;
       font-size: 14px;
   }

   .nav-menu {
       display: flex;
       flex-direction: column;
       gap: 10px;
       margin-top: 20px;
   }

   .nav-menu a {
       text-decoration: none;
       color: #333;
       font-size: 14px;
   }
   .nav-menu a:hover {
       color: #ff7300;
     }

   .header-right {
      
       display: flex;
       flex-direction: column;
       align-items: center;
   }

   .whatsapp-btn {
       background-color: #ff7300;
       color: #fff;
       border: none;
       padding: 10px 20px;
       font-size: 14px;
       border-radius: 5px;
       cursor: pointer;
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
      <div class="logo"><img src="img/logo.png" alt="">
      </div>
      <nav class="nav-menu">
          <a href="/index.php">Inicio</a>
          <a href="/servicios.php">Servicios</a>
          <a href="/presupuesto.php">Solicitar Presupuesto</a>
          <a href="/vehiculos.php">Vehículos</a>
          <a href="/conocenos.php">Conócenos</a>
          <a href="#">Contacto</a>
      </nav>
      <div class="header-right">
          <button class="whatsapp-btn">Contacta por WhatsApp</button>
          <div class="icons">
              <i class="fas fa-search"></i>
              <i class="fas fa-user"></i>
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

