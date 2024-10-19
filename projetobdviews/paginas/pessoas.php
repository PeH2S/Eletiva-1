<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Gerenciamento de Pessoas</h2>
    <a href="novo_pessoa.php" class="btn btn-success mb-3">Novo Pessoa</a>
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
            
            <tr>
                <td>1</td>
                <td>Pedro</td>
                <td>Pedro@gmail.com</td>
                <td>123.123.123-23</td>
                <td>23.123.123-23</td>
                <td>
                    <a href="excluir_pessoa.php" class="btn btn-warning">Editar</a>
                    <a href="excluir_pessoa.php" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
