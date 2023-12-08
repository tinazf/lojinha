<?php
include 'conexao.php';

// Função para obter a lista de produtos
function getProdutos() {
    global $conn;
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);

    $produtos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
    }

    return $produtos;
}

// Rotas para diferentes operações
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Listar produtos
    header('Content-Type: application/json');
    echo json_encode(getProdutos());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserir produto
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', $preco)";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'Produto inserido com sucesso']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Atualizar produto
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $nome = $put_vars['nome'];
    $descricao = $put_vars['descricao'];
    $preco = $put_vars['preco'];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco=$preco WHERE id=$id";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'Produto atualizado com sucesso']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Excluir produto
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'];

    $sql = "DELETE FROM produtos WHERE id=$id";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'Produto excluído com sucesso']);
}
?>
