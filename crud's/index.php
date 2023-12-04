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

        .navbar-brand, .navbar-text {
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lojinha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <p class="nav-link welcome-msg">Bem-vindo, <span id="username">Visitante</span></p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Cadastro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                            <label for="senha_usuario" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha_usuario" name="senha_usuario">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Adicione os campos de cadastro aqui -->
                    <form>
                        <div class="mb-3">
                            <label for="nome_usuario" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome_usuario" name="nome_usuario">
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="senha_usuario" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha_usuario" name="senha_usuario">
                        </div>
                        <div class="mb-3">
                            <label for="confirma_senha" class="form-label">Repetir Senha:</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
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
            <a href="formprod.html" class="btn btn-success">Inserir Produto</a>
        </div>

        <!-- Botões para CRUD de Categorias -->
        <div class="btn-container">
            <a href="readcat.php" class="btn btn-primary">Listar Categorias</a>
            <a href="createcat.php" class="btn btn-success">Inserir Categoria</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.
