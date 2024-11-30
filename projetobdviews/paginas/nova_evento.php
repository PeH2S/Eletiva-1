<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/eventos.php'; // Para buscar os eventos

    $erro = '';
    $sucesso = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Recebendo os dados do formulário
            $data = $_POST['data'];
            $evento_id = intval($_POST['evento_id']);
            $lotacao_maxima = intval($_POST['lotacao_maxima']);

            if (empty($data) || empty($evento_id) || empty($lotacao_maxima)) {
                $erro = 'Preencha todos os campos obrigatórios.';
            } else {
                // Inserir o evento no banco (supondo que a função criarEvento() esteja implementada)
                if (criarEvento($data, $evento_id, $lotacao_maxima)) {
                    $sucesso = 'Evento criado com sucesso!';
                } else {
                    $erro = 'Erro ao criar o evento.';
                }
            }
        } catch (Exception $e) {
            $erro = 'Erro: ' . $e->getMessage();
        }
    }

    // Buscar os eventos existentes para preencher o select
    $eventos = buscarEventos(); // Certifique-se de que esta função está implementada corretamente.
?>

<div class="container mt-5">
    <h2>Criar Novo Evento</h2>

    <?php if ($erro): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>
    
    <?php if ($sucesso): ?>
        <p class="text-success"><?= $sucesso ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="evento_id" class="form-label">Evento</label>
            <select name="evento_id" id="evento_id" class="form-select" required>
                <?php foreach ($eventos as $evento): ?>
                    <option value="<?= $evento['id'] ?>"><?= $evento['nome'] ?></option>
                <?php endforeach; ?>
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
