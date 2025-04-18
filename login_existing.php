<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Existente</title>
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
                <h1>LOGIN EXISTENTE</h1>
                <form method="POST" action="process_login_existing.php">
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
                        </div>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn-login">Logar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>