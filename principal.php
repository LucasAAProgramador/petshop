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
    <title>Principal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
            <a href="logout.php" class="btn-logout">Sair</a>
        </div>
        <div class="content">
            <div class="cart">
                <h2>Carrinho de Compras</h2>
                <!-- Conteúdo do carrinho -->
                <div id="cart-items">
                    <!-- Itens do carrinho serão adicionados aqui -->
                </div>
                <button onclick="addItemToCart()">Adicionar Item</button>
            </div>
            <div class="profile">
                <h2>Perfil do Usuário</h2>
                <img src="default-profile-image.jpg" alt="Perfil" id="profileImage">
                <button onclick="changeProfileImage()">Trocar Imagem</button>
                <div id="user-info">
                    <p>Email: <?php echo $_SESSION['email']; ?></p>
                    <p>Nome: <?php echo $_SESSION['nome']; ?></p>
                    <!-- Adicione mais informações conforme necessário -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function addItemToCart() {
            // Lógica para adicionar item ao carrinho
            const cartItems = document.getElementById('cart-items');
            const newItem = document.createElement('div');
            newItem.textContent = 'Novo Item';
            cartItems.appendChild(newItem);
        }

        function changeProfileImage() {
            // Lógica para trocar a imagem do perfil
            document.getElementById('profileImage').src = 'new-profile-image.jpg';
        }
    </script>
</body>
</html>