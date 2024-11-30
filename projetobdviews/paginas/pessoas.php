<?php require_once 'rodape.php'; ?>
<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/pessoa.php';  // Incluir o arquivo de funções para trabalhar com pessoas

    // Buscar todas as pessoas do banco de dados
    $pessoas = buscarPessoas(); 
?>

<div class="container mt-5">
    <h2>Gerenciamento de Pessoas</h2>
    <a href="novo_pessoa.php" class="btn btn-success mb-3">Nova Pessoa</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pessoas as $pessoa): ?>
            <tr>
                <td><?= $pessoa['id']; ?></td>
                <td><?= $pessoa['nome']; ?></td>
                <td><?= $pessoa['email']; ?></td>
                <td><?= $pessoa['cpf']; ?></td>
                <td><?= $pessoa['rg']; ?></td>
                <td>
                    <a href="editar_pessoa.php?id=<?= $pessoa['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_pessoa.php?id=<?= $pessoa['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>