<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lojinha de Decoração</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #007bff;
        }

        .btn-container {
            margin-bottom: 20px;
        }

        .btn-container a {
            margin-right: 10px;
        }

        .navbar {
            background-color: #007bff;
            border-radius: 5px;
        }

        .navbar-brand,
        .navbar-text {
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }

        .welcome-msg {
            color: #343a40;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php
    include_once('cabecalho.php'); ?>

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Adicione os campos de login aqui -->
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuário:</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nome_usuario" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome_usuario" name="nome_usuario">
                        </div>
                        <div class="mb-3">
                            <label for="email_usuario" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email_usuario" name="email_usuario">
                        </div>
                        <div class="mb-3">
                            <label for="senha_usuario" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha_usuario" name="senha_usuario">
                        </div>
                        <button type="submit" name="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="mb-4">Bem-vindo à Lojinha de Decoração</h1>

        <!-- Botões para CRUD de Produtos -->
        <div class="btn-container">
            <a href="readpro.php" class="btn btn-primary">Listar Produtos</a>
            <a href="formprod.php" class="btn btn-success">Inserir Produto</a>
        </div>

        <!-- Botões para CRUD de Categorias -->
        <div class="btn-container">
            <a href="readcat.php" class="btn btn-primary">Listar Categorias</a>
            <a href="formcad.php" class="btn btn-success">Inserir Categoria</a>
        </div>
    </div>
    <?php
    include_once('conexao.php');
    if (isset($_POST['btn-cadastrar'])) :
        $nome_usuario = $_POST['nome'];
        $email_usuario = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "INSERT INTO usuarios (nome, email, cpf, senha) 
    VALUES ('$nome_usuario', '$email','$cpf','$senha')";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../sessao/login.php');
        else :
            $_SESSION['mensagem'] = "Erro ao cadastrar";
            header('Location: ../index.php');
        endif;
    endif;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>