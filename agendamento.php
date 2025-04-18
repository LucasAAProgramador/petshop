<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Serviços - Pet House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            padding-top: 60px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        .services-section {
            display: flex;
            justify-content: space-around;
            padding: 50px 20px;
            background-color: #f9f9f9;
            gap: 20px;
            width: 100%;
        }
        .service-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
        }
        .service-card:hover {
            transform: scale(1.05);
        }
        .service-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .service-card h3 {
            margin: 10px 0;
            font-size: 1.5em;
        }
        .service-card p {
            color: #666;
            margin: 10px 0;
        }
        .service-card .price {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ffcc00;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
        }
        .service-card.selected {
            background-color: rgba(0, 0, 0, 0.1);
        }
        .service-card.selected::after {
            content: url('paw.png');
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.5;
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
        .form-section {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            display: none; /* Escondido por padrão */
        }
        .form-section h3 {
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .total-price {
            text-align: center;
            font-size: 2em;
            margin-top: 20px;
            color: #333;
            font-weight: bold;
            background-color: #ffcc00;
            padding: 10px;
            border-radius: 10px;
        }
        .calendar {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .calendar input[type="text"] {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            max-width: 300px;
        }
        .confirmation-message {
            display: none;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            max-width: 500px;
            margin: 20px auto;
        }
        .confirmation-message h3 {
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        .confirmation-message p {
            margin: 10px 0;
            font-size: 1.1em;
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
        <h2>Agendamento de Serviços</h2>

        <div class="services-section">
            <div class="service-card" onclick="selectService('Banho', 70)">
                <div class="price">70$</div>
                <img src="Cachorro-banho.png" alt="Banho">
                <h3>Banho</h3>
                <p>Oferecemos banhos relaxantes e revigorantes para o seu pet, utilizando produtos de alta qualidade.</p>
                <input type="checkbox" name="Banho" id="Banho" value="70" style="display: none;">
            </div>
            <div class="service-card" onclick="selectService('Tosa', 75)">
                <div class="price">75$</div>
                <img src="tosa.jpg" alt="Tosa">
                <h3>Tosa</h3>
                <p>Nossos profissionais são especializados em tosas de todas as raças, garantindo um visual bonito e saudável.</p>
                <input type="checkbox" name="Tosa" id="Tosa" value="75" style="display: none;">
            </div>
            <div class="service-card" onclick="selectService('Consulta', 120)">
                <div class="price">120$</div>
                <img src="vet(1).png" alt="Consulta">
                <h3>Consulta</h3>
                <p>Contamos com veterinários experientes para cuidar da saúde do seu pet, oferecendo consultas e tratamentos.</p>
                <input type="checkbox" name="Consulta" id="Consulta" value="120" style="display: none;">
            </div>
        </div>

        <div class="btn-container">
            <button class="btn" onclick="showForm()">Continuar</button>
        </div>

        <div class="total-price" id="total-price"></div>

        <div class="form-section" id="form-section">
            <h3>Cadastro do Pet e Agendamento</h3>
            <form id="agendamento-form">
                <div class="form-group">
                    <label for="agendamento-data">Data do Agendamento</label>
                    <input type="text" id="agendamento-data" placeholder="Selecione a data" required>
                </div>
                <div class="form-group">
                    <label for="agendamento-hora">Hora do Agendamento</label>
                    <input type="text" id="agendamento-hora" placeholder="Selecione a hora" required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome do Pet</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" id="raca" name="raca" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" name="idade" required>
                </div>
                <div class="form-group">
                    <label for="dono">Nome do Dono</label>
                    <input type="text" id="dono" name="dono" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Pet</label>
                    <textarea id="descricao" name="descricao" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <select id="genero" name="genero" required>
                        <option value="macho">Macho</option>
                        <option value="femea">Fêmea</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tamanho">Tamanho</label>
                    <select id="tamanho" name="tamanho" required>
                        <option value="pequeno">Pequeno</option>
                        <option value="medio">Médio</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>
                <div class="btn-container">
                    <button type="button" class="btn" onclick="finalizarPedido()">Finalizar Pedido</button>
                    <button type="reset" class="btn">Limpar</button>
                </div>
            </form>
        </div>

        <div class="confirmation-message" id="confirmation-message">
            <h3>Confirmação do Agendamento</h3>
            <p id="confirmation-details"></p>
            <button class="btn" onclick="window.location.reload()">OK</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var selectedServices = [];
        var totalPrice = 0;

        function selectService(serviceId, price) {
            var checkbox = document.getElementById(serviceId);
            var serviceCard = document.querySelector(`[onclick="selectService('${serviceId}', ${price})"]`);

            if (checkbox.checked) {
                checkbox.checked = false;
                serviceCard.classList.remove('selected');
                selectedServices = selectedServices.filter(service => service !== serviceId);
                totalPrice -= price;
            } else {
                checkbox.checked = true;
                serviceCard.classList.add('selected');
                selectedServices.push(serviceId);
                totalPrice += price;
            }

            document.getElementById('total-price').innerText = `Total: ${totalPrice}$`;
        }

        function showForm() {
            if (selectedServices.length > 0) {
                document.getElementById('form-section').style.display = 'block';
            } else {
                alert('Por favor, selecione pelo menos um serviço.');
            }
        }

        function finalizarPedido() {
            var data = document.getElementById('agendamento-data').value;
            var hora = document.getElementById('agendamento-hora').value;
            var nome = document.getElementById('nome').value;
            var dono = document.getElementById('dono').value;

            if (data && hora && nome && dono) {
                var confirmationDetails = `
                    <p>Agendamento marcado para <strong>${data}</strong> às <strong>${hora}</strong>.</p>
                    <p>Nome do Pet: <strong>${nome}</strong></p>
                    <p>Nome do Tutor: <strong>${dono}</strong></p>
                    <p>Serviços Selecionados: <strong>${selectedServices.join(', ')}</strong></p>
                    <p>Preço Total: <strong>${totalPrice}$</strong></p>
                    <p>Por favor, chegue com 10 minutos de antecedência.</p>
                `;
                document.getElementById('confirmation-details').innerHTML = confirmationDetails;
                document.getElementById('form-section').style.display = 'none';
                document.getElementById('confirmation-message').style.display = 'block';
            } else {
                alert('Por favor, preencha todos os campos.');
            }
        }

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