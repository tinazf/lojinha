<?php
// Conexão com o banco de dados
include 'conexao.php';  // Certifique-se de incluir o arquivo de conexão corretamente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapando os valores para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);
    $preco = mysqli_real_escape_string($conn, $_POST["preco"]);
    $categoria_id = mysqli_real_escape_string($conn, $_POST["categoria_id"]);

    // Query SQL para inserir o produto
    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES ('$nome', '$descricao', $preco, $categoria_id)";

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

