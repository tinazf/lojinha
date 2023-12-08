<?php
include '../conexao.php';
// Função para obter a lista de usuario
function getusuario() {
    global $conn;
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);

    $usuario = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuario[] = $row;
        }
    }

    return $usuario;
}

// Rotas para diferentes operações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserir usuario
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', $senha)";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'usuario inserido com sucesso']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Atualizar usuario
    parse_str(file_get_contents("php://input"), $put_vars);
    $id = $put_vars['id'];
    $nome = $put_vars['nome'];
    $email = $put_vars['email'];
    $senha = $put_vars['senha'];

    $sql = "UPDATE usuario SET nome='$nome', email='$email', senha=$senha WHERE id=$id";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'usuario atualizado com sucesso']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Excluir usuario
    parse_str(file_get_contents("php://input"), $delete_vars);
    $id = $delete_vars['id'];

    $sql = "DELETE FROM usuario WHERE id=$id";
    $conn->query($sql);
    echo json_encode(['status' => 'success', 'message' => 'usuario excluído com sucesso']);
}
?>
