<?php include("includes/session_start.php"); ?>
<?php include("includes/header.php"); ?>
<style>
html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1;
}

.container-fluid.footer {
    margin-top: auto;
}
</style>

<div class="container">
    <h1>Tu Carrito</h1>
    <div id="cart-items"></div>
    <button class="btn btn-highlight" onclick="checkout()">Finalizar Compra</button>
</div>

<script>
function renderCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const container = document.getElementById('cart-items');
    
    if (cart.length === 0) {
        container.innerHTML = '<p>El carrito está vacío</p>';
        return;
    }

    let html = '';
    let total = 0;
    
    cart.forEach(item => {
        const subtotal = item.precio * item.cantidad;
        total += subtotal;
        html += `
            <div class="cart-item">
                <h3>${item.marca} ${item.modelo}</h3>
                <p>Cantidad: ${item.cantidad}</p>
                <p>Subtotal: €${subtotal.toFixed(2)}</p>
                <button onclick="removeItem('${item.marca}', '${item.modelo}')">🗑️</button>
            </div>
        `;
    });

    html += `<h3>Total: €${total.toFixed(2)}</h3>`;
    container.innerHTML = html;
}

function removeItem(marca, modelo) {
    let cart = JSON.parse(localStorage.getItem('cart'));
    cart = cart.filter(item => !(item.marca === marca && item.modelo === modelo));
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function checkout() {
    alert('¡Compra ficticia realizada con éxito!');
    localStorage.removeItem('cart');
    renderCart();
}

renderCart();
</script>

<?php include("includes/footer.php"); ?>
