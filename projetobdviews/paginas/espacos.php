<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/espacos.php'; 

    // Buscar espaços do banco de dados
    $espacos = buscarEspacos(); // Supondo que esta função retorne um array de espaços

?>

<div class="container mt-5">
    <h2>Gerenciamento de Espaços</h2>
    <a href="novo_espaco.php" class="btn btn-success mb-3">Novo Espaço</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Localização</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($espacos as $espaco): ?>
                <tr>
                    <td><?= $espaco['id'] ?></td>
                    <td><?= $espaco['nome'] ?></td>
                    <td><?= $espaco['descricao'] ?></td>
                    <td><?= $espaco['localizacao'] ?></td>
                    <td><?= $espaco['categoria'] ?></td>
                    <td>
                        <a href="editar_espaco.php?id=<?= $espaco['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="excluir_espaco.php?id=<?= $espaco['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
