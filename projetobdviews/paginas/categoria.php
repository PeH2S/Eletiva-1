<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once('../funcoes/categorias.php'); // Função para buscar categorias

    // Buscar todas as categorias
    $categorias = todasCategorias();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Categorias</h2>
    <a href="nova_categoria.php" class="btn btn-success mb-3">Nova Categoria</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nome'] ?></td>
                    <td>
                        <a href="editar_categoria.php?id=<?= $categoria['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="excluir_categoria.php?id=<?= $categoria['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
