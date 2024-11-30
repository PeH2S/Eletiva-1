<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    
?>

<div class="container mt-5">
    <h2>Editar Evento</h2>

    <form method="post">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="produto_id" class="form-label">Evento</label>
            <select name="produto_id" id="produto_id" class="form-select" required>
                    <option value="1">Evento 1</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Lotação Máxima</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
