<header>
  <section class="main-header">
      <div class="logo"><img src="img/logo.png" alt="">
      </div>
      <nav class="nav-menu">
          <a href="#">Inicio</a>
          <a href="#">Servicios</a>
          <a href="#">Solicitar Presupuesto</a>
          <a href="#">Vehículos</a>
          <a href="#">Conócenos</a>
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

