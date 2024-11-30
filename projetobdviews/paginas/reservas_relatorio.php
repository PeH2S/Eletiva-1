<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/reservas.php'; // Função que retorna as reservas

    // Buscar as reservas
    $reservas = buscarReservasDetalhadas(); // Função que busca as reservas detalhadas
?>

<div class="container mt-5">
    <h2>Relatório de Reservas</h2>

    <?php if (count($reservas) === 0): ?>
        <p class="text-warning">Nenhuma reserva encontrada.</p>
    <?php else: ?>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data da Reserva</th>
                    <th>Status</th>
                    <th>Evento</th>
                    <th>Espaço</th>
                    <th>Nome da Pessoa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                    <tr>
                        <td><?= htmlspecialchars($reserva['id']) ?></td>
                        <td><?= htmlspecialchars($reserva['data_reserva']) ?></td>
                        <td><?= htmlspecialchars($reserva['status']) ?></td>
                        <td><?= htmlspecialchars($reserva['evento_nome']) ?></td>
                        <td><?= htmlspecialchars($reserva['espaco_nome']) ?></td>
                        <td><?= htmlspecialchars($reserva['pessoa_nome']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once 'rodape.php'; ?>
