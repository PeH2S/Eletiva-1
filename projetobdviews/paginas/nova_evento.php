<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Criar Nova Evento</h2>

    <form method="post">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="evento_id" class="form-label">Evento</label>
            <select name="evento_id" id="evento_id" class="form-select" required>
                    <option value="1">Evento 1</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lotacao_maxima" class="form-label">Lotação Máxima</label>
            <input type="number" name="lotacao_maxima" id="lotacao_maxima" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Evento</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
