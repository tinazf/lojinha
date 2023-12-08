$(document).ready(function () {

    // Carregar lista de usuario ao carregar a página
    carregarusuario();

    // Manipular o formulário para inserir usuario usando Ajax
    $('#formusuario').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'cabecalho.php',
            data: formData,
            success: function (response) {
                alert(response.message);
                carregarusuario();
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao inserir usuario.');
            }
        });
    });

    // Função para carregar a lista de usuario usando Ajax
    function carregarusuario() {
        $.ajax({
            type: 'GET',
            url: 'usuario.php',
            success: function (usuario) {
                exibirusuario(usuario);
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao carregar a lista de usuario.');
            }
        });
    }

    // Função para exibir a lista de usuario no DOM
    function exibirusuario(usuario) {
        var listausuario = $('#listausuario');
        listausuario.empty();

        usuario.forEach(function (usuario) {
            var itemLista = $('<li class="list-group-item">' +
                usuario.nome + ' - ' +
                (usuario.descricao ? usuario.descricao : 'Sem descrição') +
                ' - R$ ' + usuario.preco.toFixed(2) +
                ' <button type="button" class="btn btn-warning btn-sm editar" data-id="' + usuario.id + '">Editar</button>' +
                ' <button type="button" class="btn btn-danger btn-sm excluir" data-id="' + usuario.id + '">Excluir</button>' +
                '</li>');
            listausuario.append(itemLista);
        });

        // Adicionar eventos de clique para os botões de editar e excluir
        $('.editar').click(function () {
            var id = $(this).data('id');
            editarusuario(id);
        });

        $('.excluir').click(function () {
            var id = $(this).data('id');
            excluirusuario(id);
        });
    }

    // Função para editar um usuario
    function editarusuario(id) {
        var nome = prompt('Novo nome do usuario:');
        var descricao = prompt('Nova descrição do usuario:');
        var preco = prompt('Novo preço do usuario:');

        // Realizar a requisição PUT para atualizar o usuario
        $.ajax({
            type: 'PUT',
            url: 'usuario.php',
            data: {id: id, nome: nome, descricao: descricao, preco: preco},
            success: function (response) {
                alert(response.message);
                carregarusuario();
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao atualizar o usuario.');
            }
        });
    }

    // Função para excluir um usuario
    function excluirusuario(id) {
        if (confirm('Tem certeza que deseja excluir este usuario?')) {
            // Realizar a requisição DELETE para excluir o usuario
            $.ajax({
                type: 'DELETE',
                url: 'usuario.php',
                data: {id: id},
                success: function (response) {
                    alert(response.message);
                    carregarusuario();
                },
                error: function (error) {
                    console.log(error);
                    alert('Erro ao excluir o usuario.');
                }
            });
        }
    }
});
