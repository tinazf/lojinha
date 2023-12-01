<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria_id = $_POST["categoria_id"];

    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES ('$nome', '$descricao', $preco, $categoria_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Produto inserido com sucesso!";
    } else {
        echo "Erro ao inserir produto: " . $conn->error;
    }
}
?>
