<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapando os valores para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);

    // Query SQL para inserir o produto usando sprintf
    $sql = sprintf("INSERT INTO categorias (nome) VALUES ('%s'", $nome);

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Categoria inserido com sucesso!";
        header ("Location: readcat.php");
    } else {
        echo "Erro ao inserir categoria: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>