<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Agendamento - Pet House</title>
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
        .progress-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .progress-step {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
            font-weight: bold;
        }
        .progress-step.active {
            background-color: #333;
            color: #fff;
        }
        .progress-line {
            width: 50px;
            height: 5px;
            background-color: #ddd;
            margin: 0 10px;
        }
        .progress-line.active {
            background-color: #333;
        }
        .form-section {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
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
        }
        .btn:hover {
            background-color: #555;
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
            <a href="login.php" class="login">
                <img src="aumigo.jpg" alt="Login">
            </a>
            <a href="login.php">Login</a>
        </div>
    </div>

    <div class="container">
        <h2>Informações do Agendamento</h2>

        <div class="progress-container">
            <div class="progress-step active">1</div>
            <div class="progress-line active"></div>
            <div class="progress-step">2</div>
            <div class="progress-line"></div>
            <div class="progress-step">3</div>
        </div>

        <div class="form-section">
            <h3>Cadastro do Pet</h3>
            <form>
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
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn">Finalizar Pedido</button>
                    <button type="reset" class="btn">Limpar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>