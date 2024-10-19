<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Editar Pessoa</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="email_pessoa" class="form-label">Email</label>
            <input type="email" name="email_pessoa" id="email_pessoa" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">Editar CPF</label>
            <input type="cpf" name="cpf" id="cpf" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">Editar RG</label>
            <input type="rg" name="rg" id="rg" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Atualizar dados</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
