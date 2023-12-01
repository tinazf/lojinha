<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Categoria inserida com sucesso!";
    } else {
        echo "Erro ao inserir categoria: " . $conn->error;
    }
}
?>
