<?php
include 'conexao.php';

echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container mt-5">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-2">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">ID: ' . $row["id"] . '</h5>';
        echo '<p class="card-text">Nome: ' . $row["nome"] . '</p>';
        echo '<p class="card-text">Preço: R$ ' . number_format($row["preco"], 2, ',', '.') . '</p>';
        echo '<button class="btn btn-primary" onclick="editarProduto(' . $row["id"] . ')">Editar</button>';
        echo '<button class="btn btn-danger" onclick="excluirProduto(' . $row["id"] . ')">Excluir</button>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Nenhum produto encontrado.";
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    
    function editarProduto(id) {
       <?php include_once 'conexao.php'; 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria_id = $_POST["categoria_id"];

    $sql = "UPDATE produtos SET 
    nome='$nome', descricao='$descricao', preco=$preco, categoria_id=$categoria_id WHERE id=$id"; }?>
        alert('Editar o produto com ID ' + id);
    }

    function excluirProduto(id) {
        // Implemente a lógica de exclusão conforme necessário
        alert('Excluir o produto com ID ' + id);
    }
</script>

