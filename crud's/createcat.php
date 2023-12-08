<?php
include_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapando os valores para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);

    // Query SQL para inserir a categoria usando sprintf
    $sql = sprintf("INSERT INTO categorias (nome) VALUES ('%s')", $nome);

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Categoria inserida com sucesso!";
        header("Location: readcat.php");
        exit(); // Terminar a execução após redirecionamento
    } else {
        echo "Erro ao inserir categoria: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
