<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/eventos.php'; // Para buscar os eventos

    // Buscar os eventos do banco
    $eventos = buscarEventos(); // Supondo que essa função já esteja implementada
?>

<div class="container mt-5">
    <h2>Gerenciamento de Eventos</h2>
    <a href="nova_evento.php" class="btn btn-success mb-3">Novo Evento</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Evento</th>
                <th>Lotação Máxima</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?= $evento['id'] ?></td>
                    <td><?= date('d/m/Y', strtotime($evento['data'])) ?></td>
                    <td><?= htmlspecialchars($evento['nome']) ?></td>
                    <td><?= $evento['lotacao_maxima'] ?></td>
                    <td>
                        <a href="editar_evento.php?id=<?= $evento['id'] ?>" class="btn btn-info">Editar</a>
                        <a href="excluir_evento.php?id=<?= $evento['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
