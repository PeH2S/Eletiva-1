<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Excluir Pessoa</h2>

    <p>Tem certeza de que deseja excluir a pessoa abaixo?</p>

    <ul>
        <li><strong>Nome:</strong> </li>
        <li><strong>Email:</strong> </li>
        <li><strong>CPF:</strong> </li>
        <li><strong>RG:</strong> </li>
    </ul>

    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="pessoas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
