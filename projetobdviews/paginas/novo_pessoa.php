<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
?>

<div class="container mt-5">
    <h2>Criar Nova Pessoa</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email_pessoa" class="form-label">Email</label>
            <input type="email" name="email_pessoa" id="email_pessoa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" name="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">RG</label>
            <input type="number" name="rg" id="rg" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Pessoa</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
