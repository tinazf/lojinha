<?php
include('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM categorias WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Categoria excluída com sucesso!";
        header("location: readcat.php");
    } else {
        echo "Erro ao excluir categoria: " . $conn->error;
    }
}
?>
