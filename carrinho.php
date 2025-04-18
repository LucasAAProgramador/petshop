<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Pet House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .navbar {
            background-color: transparent;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 10px 0;
        }
        .navbar a {
            display: block;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .navbar .login-container {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
        }
        .navbar .login {
            background-color: white;
            color: #333;
            border-radius: 50%;
            padding: 10px;
            text-align: center;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            margin-right: 10px;
        }
        .navbar .login img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .navbar .login:hover {
            background-color: #ddd;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .btn-logout, .btn-cart {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        .cart {
            margin: 20px 0;
        }
        .cart-header, .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cart-header {
            font-weight: bold;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }
        .cart-item-details {
            flex: 1;
            margin-left: 10px;
        }
        .cart-item-details h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .cart-item-details p {
            margin: 5px 0;
            color: #666;
        }
        .cart-item-quantity {
            display: flex;
            align-items: center;
        }
        .cart-item-quantity input {
            width: 50px;
            text-align: center;
            margin: 0 5px;
        }
        .cart-item-remove {
            color: #d8000c;
            cursor: pointer;
        }
        .cart-total {
            text-align: right;
            font-size: 1.5em;
            margin-top: 20px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #555;
        }
        /* Estilos para o modal */
        .modal {
            display: none; /* Escondido por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            text-align: center;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="logo">
            <img src="pet_house.jpg" alt="Logo" width="80" height="60">
        </a>
        <a href="index.php">Home</a>
        <a href="produtos.php">Produtos</a>
        <a href="agendamento.php">Agendamentos</a>
        <div class="login-container">
            <?php if (isset($_SESSION['email'])): ?>
                <div class="user-info">
                    <span>Olá, <?php echo $_SESSION['nome']; ?></span>
                    <a href="logout.php" class="btn-logout">Sair</a>
                    <a href="perfil.php" class="btn-cart">
                        <img src="cart-icon.png" alt="Perfil">
                    </a>
                </div>
            <?php else: ?>
                <a href="login.php" class="login">
                    <img src="aumigo.jpg" alt="Login">
                </a>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <h2>Seu Carrinho de Compras</h2>
        <div class="cart">
            <div class="cart-header">
                <span>Produto</span>
                <span>Quantidade</span>
                <span>Preço</span>
                <span>Remover</span>
            </div>
            <div id="cart-items"></div>
            <div class="cart-total" id="cart-total"></div>
        </div>
        <div class="btn-container">
            <button class="btn" onclick="showAgendamentoForm()">Finalizar Compra</button>
        </div>
    </div>

    <!-- Modal de Agendamento -->
    <div id="agendamentoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAgendamentoForm()">&times;</span>
            <h3>Agendamento</h3>
            <form id="agendamento-form">
                <div class="form-group">
                    <label for="agendamento-data">Data do Agendamento</label>
                    <input type="text" id="agendamento-data" placeholder="Selecione a data" required>
                </div>
                <div class="form-group">
                    <label for="agendamento-hora">Hora do Agendamento</label>
                    <input type="text" id="agendamento-hora" placeholder="Selecione a hora" required>
                </div>
                <div class="btn-container">
                    <button type="button" class="btn" onclick="finalizarAgendamento()">Confirmar Agendamento</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartItemsContainer = document.getElementById('cart-items');
            let cartTotalContainer = document.getElementById('cart-total');
            cartItemsContainer.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                let cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <img src="product-placeholder.png" alt="${item.name}">
                    <div class="cart-item-details">
                        <h3>${item.name}</h3>
                        <p>R$ ${item.price.toFixed(2)}</p>
                    </div>
                    <div class="cart-item-quantity">
                        <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                    </div>
                    <span class="cart-item-remove" onclick="removeFromCart(${index})">X</span>
                `;
                cartItemsContainer.appendChild(cartItem);
                total += item.price * item.quantity;
            });

            cartTotalContainer.innerText = `Total: R$ ${total.toFixed(2)}`;
        }

        function updateQuantity(index, quantity) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (quantity > 0) {
                cart[index].quantity = parseInt(quantity);
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCart();
            }
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        function showAgendamentoForm() {
            document.getElementById('agendamentoModal').style.display = 'block';
        }

        function closeAgendamentoForm() {
            document.getElementById('agendamentoModal').style.display = 'none';
        }

        function finalizarAgendamento() {
            let data = document.getElementById('agendamento-data').value;
            let hora = document.getElementById('agendamento-hora').value;

            if (data && hora) {
                alert(`Agendamento confirmado para ${data} às ${hora}.`);
                localStorage.removeItem('cart');
                window.location.href = 'index.php';
            } else {
                alert('Por favor, selecione uma data e hora para o agendamento.');
            }
        }

        window.onload = function() {
            loadCart();
        };

        flatpickr("#agendamento-data", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });

        flatpickr("#agendamento-hora", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "10:00",
            maxTime: "20:00"
        });
    </script>
</body>
</html>