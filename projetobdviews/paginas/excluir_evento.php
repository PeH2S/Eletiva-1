<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Excluir Evento</h2>
    <p>Tem certeza de que deseja excluir o Evento abaixo?</p>
    <ul>
        <li><strong>Data:</strong> </li>
        <li><strong>Evento:</strong> </li>
        <li><strong>Lotação Máxima:</strong> </li>
    </ul>
    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="evento.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
