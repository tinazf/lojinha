$(document).ready(function () {
    // Carregar lista de usuario ao carregar a página
    carregarusuario();

    // Manipular o formulário para inserir produto usando Ajax
    $('#formProduto').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'usuario.php',
            data: formData,
            success: function (response) {
                alert(response.message);
                carregarusuario();
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao inserir o produto.');
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

        usuario.forEach(function (produto) {
            var itemLista = $('<li class="list-group-item">' +
                produto.nome + ' - ' +
                (produto.descricao ? produto.descricao : 'Sem descrição') +
                ' - R$ ' + produto.preco.toFixed(2) +
                ' <button type="button" class="btn btn-warning btn-sm editar" data-id="' + produto.id + '">Editar</button>' +
                ' <button type="button" class="btn btn-danger btn-sm excluir" data-id="' + produto.id + '">Excluir</button>' +
                '</li>');
            listausuario.append(itemLista);
        });

        // Adicionar eventos de clique para os botões de editar e excluir
        $('.editar').click(function () {
            var id = $(this).data('id');
            editarProduto(id);
        });

        $('.excluir').click(function () {
            var id = $(this).data('id');
            excluirProduto(id);
        });
    }

    // Função para editar um produto
    function editarProduto(id) {
        var nome = prompt('Novo nome do produto:');
        var descricao = prompt('Nova descrição do produto:');
        var preco = prompt('Novo preço do produto:');

        // Realizar a requisição PUT para atualizar o produto
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
                alert('Erro ao atualizar o produto.');
            }
        });
    }

    // Função para excluir um produto
    function excluirProduto(id) {
        if (confirm('Tem certeza que deseja excluir este produto?')) {
            // Realizar a requisição DELETE para excluir o produto
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
                    alert('Erro ao excluir o produto.');
                }
            });
        }
    }
});
