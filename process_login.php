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
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$data_nascimento = $_POST['data_nascimento'];

// Inserindo dados no banco de dados
$sql = "INSERT INTO usuarios (email, senha, nome, sobrenome, rg, cpf, endereco, data_nascimento)
VALUES ('$email', '$senha', '$nome', '$sobrenome', '$rg', '$cpf', '$endereco', '$data_nascimento')";

if ($conn->query($sql) === TRUE) {
    // Iniciar sessão e armazenar informações do usuário
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $nome;
    // Redirecionar para a página principal após o login bem-sucedido
    header("Location: index.php");
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>