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


<!-- Sweet Alert 2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/Logo Vectorizado.png" alt="AlamedaMotors Logo" class="brand-logo" style="height: 40px;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Inicio</a>
                <a href="presupuesto.php" class="nav-item nav-link">Cita</a>
                <a href="vehiculos.php" class="nav-item nav-link">Vehículos</a>
                <a href="conocenos.php" class="nav-item nav-link">Nosotros</a>
                <a href="servicios.php" class="nav-item nav-link">Servicios</a>
                <div class="nav-item dropdown">
                </div>
                <a href="carburantes.php" class="nav-item nav-link">Carburante</a>
            </div>
   <!-- Iconos adicionales -->
<div class="d-flex align-items-center me-4">
    <?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true): ?>
        <!-- Contenedor para alternar entre icono y botón -->
        <div id="user-container">
            <a href="#" id="user-icon" class="text-secondary nav-link">
                <i class="fa fa-user text-primary fa-lg"></i>
                <span class="ms-1"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
            </a>
            <form id="logout-form" action="logout.php" method="POST" class="d-none">
                <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" style="height: 38px;">
                    <i class="fa fa-sign-out-alt text-white"></i>
                    <span class="ms-1">Salir</span>
                </button>
            </form>
        </div>
    <?php else: ?>
        <a href="login.html" class="nav-link">
            <i class="fa fa-user text-primary fa-lg"></i>
        </a>
    <?php endif; ?>
</div>
<!-- Ícono de Carrito -->
<div class="d-flex align-items-center me-4">
    <a href="../cart.php" class="nav-link position-relative">
        <i class="fa fa-shopping-cart text-primary fa-lg"></i>
        <span id="cart-count" class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
            0
        </span>
    </a>
</div>

            <!-- Botón de contacto -->
            <a href="https://wa.me/633487862?text=hola" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">WhatsApp<i
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
    const userIcon = document.getElementById("user-icon");
    const logoutForm = document.getElementById("logout-form");

    if (userIcon && logoutForm) {
        userIcon.addEventListener("click", function (event) {
            event.preventDefault();
            userIcon.classList.add("d-none"); 
            logoutForm.classList.remove("d-none"); 
        });
    }
});
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Simulación de número de productos en el carrito (debes reemplazar esto con datos de tu backend)
        let cartCount = localStorage.getItem("cartCount") || 0;
        document.getElementById("cart-count").textContent = cartCount;

        // Ejemplo: función para actualizar el contador cuando se agregue un producto
        function addToCart() {
            cartCount++;
            localStorage.setItem("cartCount", cartCount);
            document.getElementById("cart-count").textContent = cartCount;
        }
        document.addEventListener("DOMContentLoaded", function() {
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const total = cart.reduce((sum, item) => sum + item.cantidad, 0);
        document.getElementById('cart-count').textContent = total;
    }
    updateCartCount();
});
        // Puedes llamar a addToCart() cuando agregues un producto al carrito
    });
</script>
