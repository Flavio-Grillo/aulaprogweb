<?php
include 'produtos_controller.php';
include 'header.php';

//Pega todos os usuários para preencher os dados da tabela
$products = getProducts();

//Variável que guarda o ID do usuário que será editado
$productToEdit = null;

// Verifica se existe o parâmetro edit pelo método GET
// e sé há um ID para edição de usuário
if (isset($_GET['edit'])) {
    $productToEdit = getProducts($_GET['edit']);
}
?>
<body>
    <script src="js/main.js"></script>
    <h2>Cadastro de Produtos</h2>
    <div class="container mt-3">
    <form method="POST" action="">
        <input type="hidden" id="id" name="id" value="<?php echo $productToEdit['id'] ?? ''; ?>">
        
        <div class="mb-3 mt-3">
        <label for="nome" class="form-label">Produto:</label>
        <input type="text" id="nome" class="form-control" name="nome" value="<?php echo $productToEdit['nome'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="telefone">Descrição:</label>
        <input type="text" id="descricao" class="form-control" name="descricao" value="<?php echo $productToEdit['descricao'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="email">Marca:</label>
        <input type="text" id="marca" class="form-control" name="marca" value="<?php echo $productToEdit['marca'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="text">Modelo:</label>
        <input type="text" class="form-control" id="modelo" name="modelo"  value="<?php echo $productToEdit['modelo'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="text">Valor Unitario:</label>
        <input type="text" class="form-control" id="valorunitario" name="valorunitario"  value="<?php echo $productToEdit['valorunitario'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="senha">Categoria:</label>
        <input type="text" class="form-control" id="categoria" name="categoria"  value="<?php echo $productToEdit['categoria'] ?? ''; ?>" required><br><br>
        </div>

        <div class="form-group">
        <label for="url_img">Url Img:</label>
        <input type="text" class="form-control" id="url_img" name="url_img"  value="<?php echo $productToEdit['url_img'] ?? ''; ?>" required><br><br>
        </div>

        <button type="submit" class="btn btn-success" name="save">Salvar</button>
        <button type="submit" class="btn btn-primary" name="update">Atualizar</button>
        <button type="button" class="btn btn-outline-info" onclick="clearForm()">Novo</button>
    </form>
    </div>
    <h2>Produtos Cadastrados</h2>

    <table class= "table" border="1">
        <tr class= "table-primary">
            <th>Nome</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Valor Unitario</th>
            <th>URL Imagem</th>
            <th>editar ou excluir</th>
        </tr>
        <!--Faz um loop FOR no resultset de usuários e preenche a tabela-->
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['nome']; ?></td>
                <td><?php echo $product['descricao']; ?></td>
                <td><?php echo $product['marca']; ?></td>
                <td><?php echo $product['modelo']; ?></td>
                <td><?php echo $product['valorunitario']; ?></td>
                <td><?php echo $product['url_img']; ?></td>
                <td>
                    <a href="?edit=<?php echo $product['id']; ?>">Editar</a>
                    <a href="?delete=<?php echo $product['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php include 'footer.php';?>
</body>
</html>