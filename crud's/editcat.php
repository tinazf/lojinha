<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta SQL para obter detalhes da categoria pelo ID
    $sql = "SELECT * FROM categorias WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $categoria = $result->fetch_assoc();
    } else {
        echo "Categoria não encontrada.";
        exit();
    }
} else {
    echo "ID da categoria não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Editar Categoria</h1>

    <form action="updatecat.php" method="post">
        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $categoria['nome']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>