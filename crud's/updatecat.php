<?php
include 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $sql = "UPDATE categorias SET nome='$nome' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Categoria atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar categoria: " . $conn->error;
    }
}
?>