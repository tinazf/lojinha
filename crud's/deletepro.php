<?php
include 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM produtos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto excluído com sucesso!";
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }
}
?>
