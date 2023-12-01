<?php
include 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria_id = $_POST["categoria_id"];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco=$preco, categoria_id=$categoria_id WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }
}
?>
