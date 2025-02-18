<?php include("includes/session_start.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Alameda Motors</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
   
    <?php include("includes/header.php"); ?>
    <div id="cookies-place">
      <iframe src="./cookies-headerless.php" title="W3Schools Free Online Web Tutorials"></iframe> 
      <div>
         <button onclick="hide_cookies()">No aceptar</button>
         <button onclick="hide_cookies()">Aceptar</button>
      </div>
    </div>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/alamedamotor" alt="Imagen">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Servicio de
                                        Taller
                                        //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Centro Calificado de
                                        Reparación de Automóviles</h1>
                                    <a href="servicios.php" class="btn btn-primary py-3 px-5 animated slideInDown">Saber
                                        Más<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/Logo Vectorizado.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/dinergia_adisabes1.jpg" alt="Imagen">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Gasolinera
                                        //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Red de Gasolineras
                                    </h1>
                                    <a href="conocenos.php" class="btn btn-primary py-3 px-5 animated slideInDown">Saber
                                        Más<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                                <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                                    <img class="img-fluid" src="img/Logo Vectorizado.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-orange flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Servicio de Calidad</h5>
                            <p>En nuestro taller, garantizamos un servicio de reparación y mantenimiento con los más
                                altos estándares de calidad, utilizando repuestos originales y herramientas
                                especializadas.</p>
                            <a class="text-secondary border-bottom" href="servicios.php">Leer Más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-orange flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Técnicos Expertos</h5>
                            <p>Nuestro equipo está compuesto por profesionales altamente capacitados, con años de
                                experiencia en diagnóstico y reparación de todo tipo de vehículos.</p>
                            <a class="text-secondary border-bottom" href="servicios.php">Leer Más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-tools fa-3x text-orange flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Equipo Moderno</h5>
                            <p>Contamos con tecnología avanzada para el diagnóstico y reparación de automóviles,
                                asegurando precisión y eficiencia en cada servicio.</p>
                            <a class="text-secondary border-bottom" href="servicios.php">Leer Más</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg"
                            style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                            style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">40 <span class="fs-4">Años</span></h1>
                            <h4 class="text-white">de Experiencia</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-secondary text-uppercase">// Nosotros //</h6>
                    <h1 class="mb-4"><span class="text-primary">AlamedaMotors</span> es el Mejor Lugar para el Cuidado
                        de tu coche</h1>
                    <p class="mb-4">
                        En AlamedaMotors, nos dedicamos a brindar un servicio automotriz de primera calidad.
                        Contamos con tecnología de vanguardia y un equipo de expertos comprometidos con el mantenimiento
                        y reparación de tu vehículo.
                        Nuestra misión es garantizar seguridad y confianza en cada servicio.
                    </p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Profesionales y Expertos</h6>
                                    <span>Nuestro equipo de mecánicos certificados está altamente capacitado para
                                        atender cualquier tipo de vehículo.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Centro de Servicio de Calidad</h6>
                                    <span>Utilizamos herramientas y tecnología de última generación para garantizar
                                        diagnósticos precisos y reparaciones efectivas.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                    style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Reconocimiento y Experiencia</h6>
                                    <span>Con años de trayectoria, hemos sido galardonados por nuestro compromiso con la
                                        excelencia y satisfacción del cliente.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="conocenos.php" class="btn btn-primary py-3 px-5">Leer Más<i
                            class="fa fa-arrow-right ms-3"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">40</h2>
                    <p class="text-white mb-0">Años de Experiencia</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">20</h2>
                    <p class="text-white mb-0">Técnicos Expertos</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">9999</h2>
                    <p class="text-white mb-0">Clientes Satisfechos</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">9999</h2>
                    <p class="text-white mb-0">Proyectos Completados</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">// Nuestros Servicios //</h6>
                <h1 class="mb-5 text-primary">Explora Nuestros Servicios</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="nav w-100 nav-pills me-4"></div>
                <div class="nav w-100 nav-pills me-4"></div>
                <div class="nav w-100 nav-pills me-4">
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-car-side fa-2x me-3 text-secondary"></i>
                        <h4 class="m-0">Prueba de Diagnóstico</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-car fa-2x me-3 text-secondary"></i>
                        <h4 class="m-0">Servicio de Motor</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-cog fa-2x me-3 text-secondary"></i>
                        <h4 class="m-0">Reemplazo de Neumáticos</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill"
                        data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-oil-can fa-2x me-3 text-secondary"></i>
                        <h4 class="m-0">Cambio de Aceite</h4>
                    </button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-1.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 Años de Experiencia en Servicios Automotrices</h3>
                                <p class="mb-4">
                                    Con más de 15 años en el sector, en AlamedaMotors nos hemos consolidado como un
                                    referente en mantenimiento y reparación automotriz.
                                    Nos especializamos en diagnósticos precisos, reparaciones eficientes y un servicio
                                    al cliente excepcional.
                                    Confía en nuestros expertos para mantener tu vehículo en óptimas condiciones.
                                </p>

                                <p><i class="fa fa-check text-success me-3"></i>Servicio de Calidad</p>
                                <p><i class="fa fa-check text-success me-3"></i>Trabajadores Expertos</p>
                                <p><i class="fa fa-check text-success me-3"></i>Equipos Modernos</p>
                                <a href="servicios.php" class="btn btn-primary py-3 px-5 mt-3">Leer Más<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Secciones adicionales con el mismo formato -->
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-2.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 Años de Experiencia en Servicios Automotrices</h3>
                                <p class="mb-4">
                                    Con más de 15 años en el sector, en AlamedaMotors nos hemos consolidado como un
                                    referente en mantenimiento y reparación automotriz.
                                    Nos especializamos en diagnósticos precisos, reparaciones eficientes y un servicio
                                    al cliente excepcional.
                                    Confía en nuestros expertos para mantener tu vehículo en óptimas condiciones.
                                </p>

                                <p><i class="fa fa-check text-success me-3"></i>Servicio de Calidad</p>
                                <p><i class="fa fa-check text-success me-3"></i>Trabajadores Expertos</p>
                                <p><i class="fa fa-check text-success me-3"></i>Equipos Modernos</p>
                                <a href="servicios.php" class="btn btn-primary py-3 px-5 mt-3">Leer Más<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Secciones para Reemplazo de Neumáticos y Cambio de Aceite (idénticas a las anteriores, con imágenes y títulos diferentes) -->
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-3.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 Años de Experiencia en Servicios Automotrices</h3>
                                <p class="mb-4">
                                    Con más de 15 años en el sector, en AlamedaMotors nos hemos consolidado como un
                                    referente en mantenimiento y reparación automotriz.
                                    Nos especializamos en diagnósticos precisos, reparaciones eficientes y un servicio
                                    al cliente excepcional.
                                    Confía en nuestros expertos para mantener tu vehículo en óptimas condiciones.
                                </p>

                                <p><i class="fa fa-check text-success me-3"></i>Servicio de Calidad</p>
                                <p><i class="fa fa-check text-success me-3"></i>Trabajadores Expertos</p>
                                <p><i class="fa fa-check text-success me-3"></i>Equipos Modernos</p>
                                <a href="servicios.php" class="btn btn-primary py-3 px-5 mt-3">Leer Más<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100" src="img/service-4.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">15 Años de Experiencia en Servicios Automotrices</h3>
                                <p class="mb-4">
                                    Con más de 15 años en el sector, en AlamedaMotors nos hemos consolidado como un
                                    referente en mantenimiento y reparación automotriz.
                                    Nos especializamos en diagnósticos precisos, reparaciones eficientes y un servicio
                                    al cliente excepcional.
                                    Confía en nuestros expertos para mantener tu vehículo en óptimas condiciones.
                                </p>

                                <p><i class="fa fa-check text-success me-3"></i>Servicio de Calidad</p>
                                <p><i class="fa fa-check text-success me-3"></i>Trabajadores Expertos</p>
                                <p><i class="fa fa-check text-success me-3"></i>Equipos Modernos</p>
                                <a href="servicios.php" class="btn btn-primary py-3 px-5 mt-3">Leer Más<i
                                        class="fa fa-arrow-right ms-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Servicio Fin -->


    <!-- Testimonios Inicio -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-primary text-uppercase">// Testimonios //</h6>
                <h1 class="mb-5">¡Lo que dicen nuestros clientes!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">María Rodríguez</h5>
                    <p>Empresaria</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            "Increíble servicio y atención. Llevé mi coche para una revisión y detectaron un problema
                            que
                            otros talleres pasaron por alto. Ahora mi coche funciona como nuevo. ¡Totalmente
                            recomendados!"
                        </p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Carlos López</h5>
                    <p>Abogado</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            "Excelente servicio y atención al cliente. Me explicaron cada detalle de la reparación
                            y entregaron mi coche antes de lo previsto. ¡Sin duda volveré!"
                        </p>
                    </div>
                </div>

                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Fernando García</h5>
                    <p>Ingeniero</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            "Muy profesionales y eficientes. Me ayudaron con un problema eléctrico en mi coche y
                            ahora funciona perfectamente. Precios justos y servicio de calidad."
                        </p>
                    </div>
                </div>

                <!-- Más testimonios con el mismo formato -->
            </div>
        </div>
    </div>
    <!-- Testimonios Fin -->



    <!-- Pie de Página Inicio -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Dirección</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Málaga</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>alamedamotors23@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Horario de Atención</h4>
                    <h6 class="text-light">Lunes - Viernes:</h6>
                    <p class="mb-4">09:00 AM - 09:00 PM</p>
                    <h6 class="text-light">Sábado - Domingo:</h6>
                    <p class="mb-0">09:00 AM - 12:00 PM</p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Servicios</h4>
                    <a class="btn btn-link" href="">Prueba de Diagnóstico</a>
                    <a class="btn btn-link" href="">Servicio de Motor</a>
                    <a class="btn btn-link" href="">Reemplazo de Neumáticos</a>
                    <a class="btn btn-link" href="">Cambio de Aceite</a>
                    <a class="btn btn-link" href="">Limpieza con Aspiradora</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Legal</h4>
                    <a class="btn btn-link" href="cookies.php">Política de Cookies</a>
                    <a class="btn btn-link" href="terminos.php">Términos y condiciones</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie de Página Fin -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
       function hide_cookies() {
          const cookies_place = document.getElementById("cookies-place");
          cookies_place.style.display = "none";
          document.cookie += "cookies-hide";
       }
       
       function show_cookies() {
          const cookies_place = document.getElementById("cookies-place");
          cookies_place.style.display = "grid";
       }

       const cookies = document.cookie;
       if (!cookies.match("cookies-hide")) {
          show_cookies();
       }
    </script>
</body>

</html>
