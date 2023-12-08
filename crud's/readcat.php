<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Lista de Categorias</h1>

    <?php
    $sql = "SELECT * FROM categorias";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<ul class="list-group">';
        while ($row = $result->fetch_assoc()) {
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
            echo 'ID: ' . $row["id"] . ' <br> Nome: ' . $row["nome"];
            echo '<div class="btn-group">';
            echo '<button type="button" class="btn btn-primary" onclick="editarCategoria(' . $row["id"] . ')">Editar</button>';
            echo '<button type="button" class="btn btn-danger" onclick="excluirCategoria(' . $row["id"] . ')">Excluir</button>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<div class="alert alert-warning" role="alert">Nenhuma categoria encontrada.</div>';
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function editarCategoria(id) {
        window.location.href = 'editcat.php?id=' + id;
    }

    function excluirCategoria(id) {
        window.location.href = 'deletecat.php?id=' + id;
        var confirmacao = confirm('Tem certeza que deseja excluir esta categoria?');
        if (confirmacao) {
            // Adicione a lógica para excluir a categoria
            alert('Excluir a categoria com ID ' + id);
        }
    }
</script>

</body>
</html>

