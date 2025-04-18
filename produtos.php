<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet House - Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .navbar {
            background-color: transparent; /* Fundo totalmente transparente */
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
        .search-bar {
            text-align: center;
            margin: 20px 0;
        }
        .search-bar input[type="text"] {
            width: 50%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-card h3 {
            margin: 10px 0;
            font-size: 1.5em;
        }
        .product-card p {
            color: #666;
            margin: 10px 0;
        }
        .product-card .price {
            font-size: 1.2em;
            color: #333;
            margin: 10px 0;
        }
        .product-card .rating {
            color: #f39c12;
            margin: 10px 0;
        }
        .product-card button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .product-card button:hover {
            background-color: #555;
        }
        .notice {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background-color: #ffdddd;
            color: #d8000c;
            border: 1px solid #d8000c;
            border-radius: 5px;
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
        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            border: none; /* Remove a borda da imagem */
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
        .user-info {
            display: flex;
            align-items: center;
        }
        .btn-logout, .btn-cart {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
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
                <a href="perfil.php" class="login">
                    <img src="perfil-icon.png" alt="Perfil">
                </a>
                <a href="carrinho.php" class="btn-cart">
                    <img src="cart-icon.png" alt="Carrinho">
                </a>
            <?php else: ?>
                <a href="login.php" class="login">
                    <img src="aumigo.jpg" alt="Login">
                </a>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <h2>Nossos Produtos</h2>
        <div class="search-bar">
            <input type="text" id="search" placeholder="Buscar produtos...">
        </div>
        <div class="notice">
            <p>Não aceitamos pagamentos online. Por favor, agende a retirada e pagamento no estabelecimento.</p>
        </div>
        <div class="products" id="product-list">
            <div class="product-card">
                <img src="COLEIRA_TAGID-black.webp" alt="Coleira de Peitoral">
                <h3>Coleira de Peitoral</h3>
                <p class="price">R$ 15,00</p>
                <p class="rating">★★★★☆</p>
                <button onclick="addToCart('Coleira de Peitoral', 15)">Adicionar ao Carrinho</button>
            </div>
            <div class="product-card">
                <img src="comedouro-cachorro-paris-furacao-pet-n4-1900ml-43502af4-8bi2chae8g.webp" alt="Pote de Ração">
                <h3>Pote de Ração</h3>
                <p class="price">R$ 20,00</p>
                <p class="rating">★★★★★</p>
                <button onclick="addToCart('Pote de Ração', 20)">Adicionar ao Carrinho</button>
            </div>
            <div class="product-card">
                <img src="2775546375_1.webp" alt="Bolinha para Cachorro">
                <h3>Bolinha para Cachorro</h3>
                <p class="price">R$ 15,00</p>
                <p class="rating">★★★★☆</p>
                <button onclick="addToCart('Bolinha para Cachorro', 15)">Adicionar ao Carrinho</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="Post do instagram como refrescer o pet no calor moderno amarelo.png" alt="Aviso de Pagamento">
        </div>
    </div>

    <script>
        function addToCart(productName, price) {
            if (!<?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>) {
                window.location.href = 'login.php';
                return;
            }

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push({ name: productName, price: price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(productName + " foi adicionado ao carrinho!");
        }

        document.getElementById('search').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let products = document.getElementsByClassName('product-card');
            for (let i = 0; i < products.length; i++) {
                let productName = products[i].getElementsByTagName('h3')[0].innerText.toLowerCase();
                if (productName.includes(filter)) {
                    products[i].style.display = "";
                } else {
                    products[i].style.display = "none";
                }
            }
        });

        // Modal script
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        // Abrir o modal ao carregar a página
        window.onload = function() {
            modal.style.display = "block";
        }

        // Fechar o modal ao clicar no "x"
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Fechar o modal ao clicar fora dele
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>