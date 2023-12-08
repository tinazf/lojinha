$(document).ready(function () {
    // Carregar lista de produtos ao carregar a página
    carregarProdutos();

    // Manipular o formulário para inserir produto usando Ajax
    $('#formProduto').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'produtos.php',
            data: formData,
            success: function (response) {
                alert(response.message);
                carregarProdutos();
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao inserir o produto.');
            }
        });
    });

    // Função para carregar a lista de produtos usando Ajax
    function carregarProdutos() {
        $.ajax({
            type: 'GET',
            url: 'produtos.php',
            success: function (produtos) {
                exibirProdutos(produtos);
            },
            error: function (error) {
                console.log(error);
                alert('Erro ao carregar a lista de produtos.');
            }
        });
    }

    // Função para exibir a lista de produtos no DOM
    function exibirProdutos(produtos) {
        var listaProdutos = $('#listaProdutos');
        listaProdutos.empty();

        produtos.forEach(function (produto) {
            var itemLista = $('<li class="list-group-item">' +
                produto.nome + ' - ' +
                (produto.descricao ? produto.descricao : 'Sem descrição') +
                ' - R$ ' + produto.preco.toFixed(2) +
                ' <button type="button" class="btn btn-warning btn-sm editar" data-id="' + produto.id + '">Editar</button>' +
                ' <button type="button" class="btn btn-danger btn-sm excluir" data-id="' + produto.id + '">Excluir</button>' +
                '</li>');
            listaProdutos.append(itemLista);
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
            url: 'produtos.php',
            data: {id: id, nome: nome, descricao: descricao, preco: preco},
            success: function (response) {
                alert(response.message);
                carregarProdutos();
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
                url: 'produtos.php',
                data: {id: id},
                success: function (response) {
                    alert(response.message);
                    carregarProdutos();
                },
                error: function (error) {
                    console.log(error);
                    alert('Erro ao excluir o produto.');
                }
            });
        }
    }
});
