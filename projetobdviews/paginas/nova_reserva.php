<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<div class="container mt-5">
    <h2>Criar Nova Reserva</h2>

    <form method="post">
        <div class="mb-3">
            <label for="data_inicial" class="form-label">Data Inicial</label>
            <input type="date" name="data_inicial" id="data_inicial" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_final" class="form-label">Data</label>
            <input type="date" name="data_final" id="data_final" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="evento_id" class="form-label">Evento</label>
            <select name="evento_id" id="evento_id" class="form-select" required>
                    <option value="1">Evento 1</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Criar Reserva</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
