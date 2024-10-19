<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'
?>

<div class="container mt-5">
    <h2>Excluir Espaço</h2>
    
    <p>Tem certeza de que deseja excluir o espaço abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> </li>
        <li><strong>Descrição:</strong> </li>
        <li><strong>Localização:</strong> </li>
        <li><strong>Categoria:</strong> </li>
    </ul>
    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="espaco.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
