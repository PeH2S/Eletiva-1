<?php require_once 'rodape.php'; ?>
<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/reservas.php'; 

    $reservas = buscarReservas(); // Função para buscar as reservas.
?>

<div class="container mt-5">
    <h2>Gerenciamento de Reservas</h2>
    <a href="nova_reserva.php" class="btn btn-success mb-3">Nova Reserva</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Evento</th>
                <th>Pessoa</th>
                <th>Espaço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reservas as $r) : ?>
            <tr>
                <td><?= $r['id']?></td>
                <td><?= $r['data_inicial']?></td>
                <td><?= $r['data_final']?></td>
                <td><?= $r['evento_nome']?></td> <!-- Nome do evento relacionado -->
                <td><?= $r['pessoa_nome']?></td> <!-- Nome da pessoa que fez a reserva -->
                <td><?= $r['espaco_nome']?></td> <!-- Nome do espaço reservado -->
                <td><?= $r['status']?></td> <!-- Status da reserva -->
                <td>
                    <a href="editar_reserva.php?id=<?= $r['id']?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_reserva.php?id=<?= $r['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>