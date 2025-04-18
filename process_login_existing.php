<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtendo dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificando se o usuário existe no banco de dados
$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar sessão e armazenar informações do usuário
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $row['email'];
    $_SESSION['nome'] = $row['nome'];
    // Redirecionar para a página principal após o login bem-sucedido
    header("Location: index.php");
    exit();
} else {
    echo "Email ou senha incorretos.";
}

$conn->close();
?>