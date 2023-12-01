<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapando os valores para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);
    $preco = mysqli_real_escape_string($conn, $_POST["preco"]);
    $categoria_id = mysqli_real_escape_string($conn, $_POST["categoria_id"]);

    // Query SQL para inserir o produto usando sprintf
    $sql = sprintf("INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES ('%s', '%s', %s, %s)", $nome, $descricao, $preco, $categoria_id);

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Produto inserido com sucesso!";
    } else {
        echo "Erro ao inserir produto: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
