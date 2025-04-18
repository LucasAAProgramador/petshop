<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-login">
        <div class="left-login">
           <h1>Faça login<br>E entre para o nosso time</h1> 
           <img src="pets-with-halloween-costumes-animate.svg" class="left-login-image" alt="Pet House">
         </div>
         <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form method="POST" action="process_login.php">
                    <div class="form-container">
                        <div class="form-column">
                            <div class="textfield">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="textfield">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                                <span class="toggle-password" onclick="togglePasswordVisibility()">👁️</span>
                            </div>
                            <div class="textfield">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" placeholder="Nome" required>
                            </div>
                            <div class="textfield">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" name="sobrenome" placeholder="Sobrenome" required>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="textfield">
                                <label for="rg">RG</label>
                                <input type="text" name="rg" placeholder="RG" required>
                            </div>
                            <div class="textfield">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" placeholder="CPF" required>
                            </div>
                            <div class="textfield">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" placeholder="Endereço" required>
                            </div>
                            <div class="textfield">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required>
                            </div>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn-login">Logar</button>
                    </div>
                </form>
                <div class="existing-account">
                    <p>Já tem uma conta? <a href="login_existing.php">Clique aqui para fazer login</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>