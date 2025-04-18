<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet House</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            overflow-x: hidden;
        }
        .navbar {
            background-color: transparent;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: white;
            width: 100%;
        }
        .navbar a {
            color: black;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo img {
            width: 80px;
            height: 60px;
        }
        .navbar .login-container {
            display: flex;
            align-items: center;
            margin-right: 20px; 
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
        .navbar .social-buttons {
            display: flex;
            align-items: center;
            margin-left: 20px; /* Espaçamento entre os botões e os outros elementos */
        }
        .navbar .social-buttons a {
            margin-left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            color: #333;
            text-decoration: none;
        }
        .navbar .social-buttons a img {
            width: 20px;
            height: 20px;
        }
        .navbar .social-buttons a:hover {
            background-color: #ddd;
        }
        .welcome-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            width: 100%;
        }
        .welcome-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .welcome-section p {
            font-size: 1.2em;
            color: #666;
            max-width: 800px;
            margin: auto;
        }
        .slider {
            margin: 20px auto;
            width: 800px;
            height: 400px;
            overflow: hidden;
            margin-bottom: 50px; /* Adiciona espaço abaixo do carrossel */
        }
        .slides {
            width: 400%;
            height: 400px;
            display: flex;
            transition: margin-left 2s;
        }
        .slides input {
            display: none;
        }
        .slide {
            width: 25%;
            transition: 2s;
        }
        .slide img {
            width: 100%;
            height: 100%;
        }
        .manual-navigation {
            position: relative;
            width: 800px;
            margin-top: -40px;
            display: flex;
            justify-content: center;
        }
        .manual-btn {
            border: 2px solid #fff;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }
        .manual-btn:not(:last-child) {
            margin-right: 40px;
        }
        .manual-btn:hover {
            background: #fff;
        }
        #radio1:checked ~ .slides {
            margin-left: 0;
        }
        #radio2:checked ~ .slides {
            margin-left: -25%;
        }
        #radio3:checked ~ .slides {
            margin-left: -50%;
        }
        #radio4:checked ~ .slides {
            margin-left: -75%;
        }
        .navigation-auto {
            position: relative;
            width: 800px;
            margin-top: 360px;
            display: flex;
            justify-content: center;
        }
        .navigation-auto div {
            border: 2px solid #20a6ff;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }
        .navigation-auto div:not(:last-child) {
            margin-right: 40px;
        }
        #radio1:checked ~ .navigation-auto .auto-btn1 {
            background-color: #fff;
        }
        #radio2:checked ~ .navigation-auto .auto-btn2 {
            background-color: #fff;
        }
        #radio3:checked ~ .navigation-auto .auto-btn3 {
            background-color: #fff;
        }
        #radio4:checked ~ .navigation-auto .auto-btn4 {
            background-color: #fff;
        }
        .services-section {
            display: flex;
            justify-content: space-around;
            padding: 50px 20px;
            background-color: #f9f9f9;
            gap: 20px; /* Adiciona espaçamento entre os serviços */
            width: 100%;
        }
        .service {
            text-align: center;
            flex: 1;
            max-width: 300px;
            position: relative;
        }
        .service img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .service h3 {
            margin-top: 15px;
            font-size: 1.5em;
        }
        .service p {
            color: #666;
        }
        .service button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        .service button:hover {
            background: rgba(0, 0, 0, 0.1);
        }
        .sponsors-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            width: 100%;
        }
        .sponsors-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .sponsors {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px; /* Adiciona espaçamento entre os patrocinadores */
            width: 100%;
        }
        .sponsor {
            flex: 1;
            max-width: 200px;
        }
        .sponsor img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .contact-section {
            text-align: center;
            padding: 20px 20px; /* Reduz o padding */
            background-color: #f9f9f9;
            width: 100%;
        }
        .contact-section h2 {
            font-size: 1.5em; /* Reduz o tamanho da fonte */
            margin-bottom: 10px; /* Reduz a margem inferior */
        }
        .contact-info {
            font-size: 1em; /* Reduz o tamanho da fonte */
            color: #666;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            width: 100%;
        }
        /* Estilos para os modais */
        .modal {
            display: none;
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
            text-align: left; /* Alinhamento à esquerda para melhor leitura */
            border-radius: 10px;
        }
        .modal-content img {
            width: 50%; /* Reduz o tamanho da imagem */
            height: auto;
            border-radius: 10px;
            display: block;
            margin: 0 auto 20px; /* Centraliza a imagem e adiciona margem inferior */
        }
        .modal-content p {
            font-size: 1.2em; /* Aumenta o tamanho do texto */
            margin-bottom: 10px; /* Adiciona margem inferior para espaçamento */
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
        <div class="logo">
            <a href="index.php">
                <img src="pet_house.jpg" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="produtos.php">Produtos</a>
            <a href="agendamento.php">Agendamentos</a>
        </div>
        <div class="social-buttons">
            <a href="https://www.instagram.com/seu_instagram" target="_blank">
                <img src="instagram-icon.png" alt="Instagram">
            </a>
            <a href="https://wa.me/seu_numero_whatsapp" target="_blank">
                <img src="whatsapp-icon.png" alt="WhatsApp">
            </a>
        </div>
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

    <div class="welcome-section">
        <h2>Bem-vindo ao Pet House</h2>
        <p>Oferecemos os melhores serviços de banho e tosa para o seu pet. Nossa equipe é altamente qualificada e apaixonada por animais. Venha nos visitar e veja como podemos cuidar do seu amigo de quatro patas!</p>
    </div>

    <div class="slider">
        <div class="slides">
            <!--Radio Buttons-->
            <input type="radio" name="radio-btn" id="radio1" checked>
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--Fim Radio Buttons-->

            <!--Slide imagens-->
            <div class="slide first">
                <img src="cachorrogenio.jpg" alt="imagem1">
            </div>
            <div class="slide">
                <img src="Instagram post pet shop com foto amarelo e branco.png" alt="imagem2">
            </div>
            <div class="slide">
                <img src="cachorrogenio.jpg" alt="imagem3">
            </div>
            <div class="slide">
                <img src="cuidados-filhote-de-cachorro.jpg" alt="imagem4">
            </div>
            <!--Fim Slide imagens-->

            <!--Navigation auto-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
        </div>

        <!--Navigation manual-->
        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
    </div>

    <div class="services-section">
        <div class="service">
            <img src="Cachorro-banho.png" alt="Banho">
            <h3>Banho</h3>
            <p>Oferecemos banhos relaxantes e revigorantes para o seu pet, utilizando produtos de alta qualidade.</p>
            <button onclick="openModal('banhoModal')"></button>
        </div>
        <div class="service">
            <img src="tosa.jpg" alt="Tosa">
            <h3>Tosa</h3>
            <p>Nossos profissionais são especializados em tosas de todas as raças, garantindo um visual bonito e saudável.</p>
            <button onclick="openModal('tosaModal')"></button>
        </div>
        <div class="service">
            <img src="vet(1).png" alt="Consulta">
            <h3>Consulta</h3>
            <p>Contamos com veterinários experientes para cuidar da saúde do seu pet, oferecendo consultas e tratamentos.</p>
            <button onclick="openModal('consultaModal')"></button>
        </div>
    </div>

    <div class="sponsors-section">
        <h2>Nossos Patrocinadores</h2>
        <div class="sponsors">
            <div class="sponsor">
                <img src="petclean.png" alt="Patrocinador 1">
            </div>
            <div class="sponsor">
                <img src="images.jpeg" alt="Patrocinador 2">
            </div>
            <div class="sponsor">
                <img src="asspet.jpeg" alt="Patrocinador 3">
            </div>
        </div>
    </div>

    <div class="contact-section">
        <h3>Contato do criador do site</h3>
        <div class="contact-info">
            <p>Instagram: @eylucas02</p>
            <p>Twitter: @lucashacker</p>
            <p>Telefone: (+55) 11 95351-1114</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Pet House. Todos os direitos reservados.</p>
    </div>

    <!-- Modal Banho -->
    <div id="banhoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('banhoModal')">&times;</span>
            <h2>Banho</h2>
            <img src="306935-como-escolher-os-profissionais-para-trabalhar-com-banho-e-tosa.webp" alt="Funcionário Banho">
            <p>Nome: Fernanda</p>
            <p>Especialidade: Banho e Higiene</p>
            <p>Produtos Utilizados: Shampoo e Condicionador de alta qualidade</p>
            <p>Descrição: Fernanda é uma profissional com 5 anos de experiência em cuidados com pets, garantindo um banho relaxante e seguro para seu animal.</p>
            <p>Duração do Serviço: Aproximadamente 1 hora</p>
            <p>Horário de Atendimento: Segunda a Sexta, das 9h às 18h</p>
        </div>
    </div>

    <!-- Modal Tosa -->
    <div id="tosaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('tosaModal')">&times;</span>
            <h2>Tosa</h2>
            <img src="Blog-2.png" alt="Funcionário Tosa">
            <p>Nome: João Silva</p>
            <p>Especialidade: Tosa de todas as raças</p>
            <p>Produtos Utilizados: Tesouras e Máquinas de alta precisão</p>
            <p>Descrição: João é um tosador experiente, especializado em todas as raças, garantindo um visual bonito e saudável para seu pet.</p>
            <p>Duração do Serviço: Aproximadamente 1 hora e 30 minutos</p>
            <p>Horário de Atendimento: Segunda a Sábado, das 9h às 17h</p>
        </div>
    </div>

    <!-- Modal Consulta -->
    <div id="consultaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('consultaModal')">&times;</span>
            <h2>Consulta</h2>
            <img src="veterinario-verificando-a-saude-do-filhote.jpg" alt="Veterinário">
            <p>Nome: Dr. Carla Pereira</p>
            <p>Especialidade: Medicina Veterinária</p>
            <p>Produtos Utilizados: Equipamentos de última geração</p>
            <p>Descrição: Dr. Carla é uma veterinária com mais de 10 anos de experiência, cuidando da saúde do seu pet com dedicação e profissionalismo.</p>
            <p>Duração da Consulta: Aproximadamente 30 minutos</p>
            <p>Horário de Atendimento: Segunda a Sexta, das 8h às 17h</p>
        </div>
    </div>

    <script>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet House</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            overflow-x: hidden;
        }
        .navbar {
            background-color: transparent;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: white;
            width: 100%;
        }
        .navbar a {
            color: black;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo img {
            width: 80px;
            height: 60px;
        }
        .navbar .login-container {
            display: flex;
            align-items: center;
            margin-right: 20px; 
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
        .navbar .social-buttons {
            display: flex;
            align-items: center;
            margin-left: 20px; /* Espaçamento entre os botões e os outros elementos */
        }
        .navbar .social-buttons a {
            margin-left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            color: #333;
            text-decoration: none;
        }
        .navbar .social-buttons a img {
            width: 20px;
            height: 20px;
        }
        .navbar .social-buttons a:hover {
            background-color: #ddd;
        }
        .welcome-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            width: 100%;
        }
        .welcome-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .welcome-section p {
            font-size: 1.2em;
            color: #666;
            max-width: 800px;
            margin: auto;
        }
        .slider {
            margin: 20px auto;
            width: 800px;
            height: 400px;
            overflow: hidden;
            margin-bottom: 50px; /* Adiciona espaço abaixo do carrossel */
        }
        .slides {
            width: 400%;
            height: 400px;
            display: flex;
            transition: margin-left 2s;
        }
        .slides input {
            display: none;
        }
        .slide {
            width: 25%;
            transition: 2s;
        }
        .slide img {
            width: 100%;
            height: 100%;
        }
        .manual-navigation {
            position: relative;
            width: 800px;
            margin-top: -40px;
            display: flex;
            justify-content: center;
        }
        .manual-btn {
            border: 2px solid #fff;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }
        .manual-btn:not(:last-child) {
            margin-right: 40px;
        }
        .manual-btn:hover {
            background: #fff;
        }
        #radio1:checked ~ .slides {
            margin-left: 0;
        }
        #radio2:checked ~ .slides {
            margin-left: -25%;
        }
        #radio3:checked ~ .slides {
            margin-left: -50%;
        }
        #radio4:checked ~ .slides {
            margin-left: -75%;
        }
        .navigation-auto {
            position: relative;
            width: 800px;
            margin-top: 360px;
            display: flex;
            justify-content: center;
        }
        .navigation-auto div {
            border: 2px solid #20a6ff;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }
        .navigation-auto div:not(:last-child) {
            margin-right: 40px;
        }
        #radio1:checked ~ .navigation-auto .auto-btn1 {
            background-color: #fff;
        }
        #radio2:checked ~ .navigation-auto .auto-btn2 {
            background-color: #fff;
        }
        #radio3:checked ~ .navigation-auto .auto-btn3 {
            background-color: #fff;
        }
        #radio4:checked ~ .navigation-auto .auto-btn4 {
            background-color: #fff;
        }
        .services-section {
            display: flex;
            justify-content: space-around;
            padding: 50px 20px;
            background-color: #f9f9f9;
            gap: 20px; /* Adiciona espaçamento entre os serviços */
            width: 100%;
        }
        .service {
            text-align: center;
            flex: 1;
            max-width: 300px;
            position: relative;
        }
        .service img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .service h3 {
            margin-top: 15px;
            font-size: 1.5em;
        }
        .service p {
            color: #666;
        }
        .service button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        .service button:hover {
            background: rgba(0, 0, 0, 0.1);
        }
        .sponsors-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            width: 100%;
        }
        .sponsors-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .sponsors {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px; /* Adiciona espaçamento entre os patrocinadores */
            width: 100%;
        }
        .sponsor {
            flex: 1;
            max-width: 200px;
        }
        .sponsor img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .contact-section {
            text-align: center;
            padding: 20px 20px; /* Reduz o padding */
            background-color: #f9f9f9;
            width: 100%;
        }
        .contact-section h2 {
            font-size: 1.5em; /* Reduz o tamanho da fonte */
            margin-bottom: 10px; /* Reduz a margem inferior */
        }
        .contact-info {
            font-size: 1em; /* Reduz o tamanho da fonte */
            color: #666;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            width: 100%;
        }
        /* Estilos para os modais */
        .modal {
            display: none;
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
            text-align: left; /* Alinhamento à esquerda para melhor leitura */
            border-radius: 10px;
        }
        .modal-content img {
            width: 50%; /* Reduz o tamanho da imagem */
            height: auto;
            border-radius: 10px;
            display: block;
            margin: 0 auto 20px; /* Centraliza a imagem e adiciona margem inferior */
        }
        .modal-content p {
            font-size: 1.2em; /* Aumenta o tamanho do texto */
            margin-bottom: 10px; /* Adiciona margem inferior para espaçamento */
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
        <div class="logo">
            <a href="index.php">
                <img src="pet_house.jpg" alt="Logo">
            </a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="produtos.php">Produtos</a>
            <a href="agendamento.php">Agendamentos</a>
        </div>
        <div class="social-buttons">
            <a href="https://www.instagram.com/seu_instagram" target="_blank">
                <img src="instagram-icon.png" alt="Instagram">
            </a>
            <a href="https://wa.me/seu_numero_whatsapp" target="_blank">
                <img src="whatsapp-icon.png" alt="WhatsApp">
            </a>
        </div>
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

    <div class="welcome-section">
        <h2>Bem-vindo ao Pet House</h2>
        <p>Oferecemos os melhores serviços de banho e tosa para o seu pet. Nossa equipe é altamente qualificada e apaixonada por animais. Venha nos visitar e veja como podemos cuidar do seu amigo de quatro patas!</p>
    </div>

    <div class="slider">
        <div class="slides">
            <!--Radio Buttons-->
            <input type="radio" name="radio-btn" id="radio1" checked>
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--Fim Radio Buttons-->

            <!--Slide imagens-->
            <div class="slide first">
                <img src="cachorrogenio.jpg" alt="imagem1">
            </div>
            <div class="slide">
                <img src="Instagram post pet shop com foto amarelo e branco.png" alt="imagem2">
            </div>
            <div class="slide">
                <img src="cachorrogenio.jpg" alt="imagem3">
            </div>
            <div class="slide">
                <img src="cuidados-filhote-de-cachorro.jpg" alt="imagem4">
            </div>
            <!--Fim Slide imagens-->

            <!--Navigation auto-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
        </div>

        <!--Navigation manual-->
        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
    </div>

    <div class="services-section">
        <div class="service">
            <img src="Cachorro-banho.png" alt="Banho">
            <h3>Banho</h3>
            <p>Oferecemos banhos relaxantes e revigorantes para o seu pet, utilizando produtos de alta qualidade.</p>
            <button onclick="openModal('banhoModal')"></button>
        </div>
        <div class="service">
            <img src="tosa.jpg" alt="Tosa">
            <h3>Tosa</h3>
            <p>Nossos profissionais são especializados em tosas de todas as raças, garantindo um visual bonito e saudável.</p>
            <button onclick="openModal('tosaModal')"></button>
        </div>
        <div class="service">
            <img src="vet(1).png" alt="Consulta">
            <h3>Consulta</h3>
            <p>Contamos com veterinários experientes para cuidar da saúde do seu pet, oferecendo consultas e tratamentos.</p>
            <button onclick="openModal('consultaModal')"></button>
        </div>
    </div>

    <div class="sponsors-section">
        <h2>Nossos Patrocinadores</h2>
        <div class="sponsors">
            <div class="sponsor">
                <img src="petclean.png" alt="Patrocinador 1">
            </div>
            <div class="sponsor">
                <img src="images.jpeg" alt="Patrocinador 2">
            </div>
            <div class="sponsor">
                <img src="asspet.jpeg" alt="Patrocinador 3">
            </div>
        </div>
    </div>

    <div class="contact-section">
        <h3>Contato do criador do site</h3>
        <div class="contact-info">
            <p>Instagram: @eylucas02</p>
            <p>Twitter: @lucashacker</p>
            <p>Telefone: (+55) 11 95351-1114</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Pet House. Todos os direitos reservados.</p>
    </div>

    <!-- Modal Banho -->
    <div id="banhoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('banhoModal')">&times;</span>
            <h2>Banho</h2>
            <img src="306935-como-escolher-os-profissionais-para-trabalhar-com-banho-e-tosa.webp" alt="Funcionário Banho">
            <p>Nome: Fernanda</p>
            <p>Especialidade: Banho e Higiene</p>
            <p>Produtos Utilizados: Shampoo e Condicionador de alta qualidade</p>
            <p>Descrição: Fernanda é uma profissional com 5 anos de experiência em cuidados com pets, garantindo um banho relaxante e seguro para seu animal.</p>
            <p>Duração do Serviço: Aproximadamente 1 hora</p>
            <p>Horário de Atendimento: Segunda a Sexta, das 9h às 18h</p>
        </div>
    </div>

    <!-- Modal Tosa -->
    <div id="tosaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('tosaModal')">&times;</span>
            <h2>Tosa</h2>
            <img src="Blog-2.png" alt="Funcionário Tosa">
            <p>Nome: João Silva</p>
            <p>Especialidade: Tosa de todas as raças</p>
            <p>Produtos Utilizados: Tesouras e Máquinas de alta precisão</p>
            <p>Descrição: João é um tosador experiente, especializado em todas as raças, garantindo um visual bonito e saudável para seu pet.</p>
            <p>Duração do Serviço: Aproximadamente 1 hora e 30 minutos</p>
            <p>Horário de Atendimento: Segunda a Sábado, das 9h às 17h</p>
        </div>
    </div>

    <!-- Modal Consulta -->
    <div id="consultaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('consultaModal')">&times;</span>
            <h2>Consulta</h2>
            <img src="veterinario-verificando-a-saude-do-filhote.jpg" alt="Veterinário">
            <p>Nome: Dr. Carla Pereira</p>
            <p>Especialidade: Medicina Veterinária</p>
            <p>Produtos Utilizados: Equipamentos de última geração</p>
            <p>Descrição: Dr. Carla é uma veterinária com mais de 10 anos de experiência, cuidando da saúde do seu pet com dedicação e profissionalismo.</p>
            <p>Duração da Consulta: Aproximadamente 30 minutos</p>
            <p>Horário de Atendimento: Segunda a Sexta, das 8h às 17h</p>
        </div>
    </div>

    <script>
                
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }

        // Carrossel automático
        let counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 2000); // Muda a cada 7 segundos
    </script>
</body>
</html>