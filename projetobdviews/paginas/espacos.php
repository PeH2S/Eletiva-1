<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
?>

<div class="container mt-5">
    <h2>Gerenciamento de Espaços</h2>
    <a href="novo_produto.php" class="btn btn-success mb-3">Novo Espaço</a>
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
            
            <tr>
                <td>1</td>
                <td>Fazenda Boa Esperança</td>
                <td>Fazenda bonita, pronta para seu churrasco</td>
                <td>ROD KM007</td>
                <td>Zona Rural</td>
                <td>
                    <a href="editar_produto.php" class="btn btn-warning">Editar</a>
                    <a href="excluir_produto.php" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
