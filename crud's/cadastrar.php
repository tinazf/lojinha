<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapando os valores para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

    // Query SQL para inserir o produto usando sprintf
    $sql = sprintf("INSERT INTO produtos (nome, email, senha) VALUES ('%s', '%s', %s)", $nome, $email, $senha);

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Usuario cadastrado com sucesso!";
        header ("Location: index.php");
    } else {
        echo "Erro ao cadastrar usuario: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>