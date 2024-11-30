<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/reservas.php'; 
    require_once '../funcoes/eventos.php'; 

    $erro = '';
    
    // Receber o ID da reserva que será excluída
    $reserva_id = $_GET['id'];
    if (!$reserva_id) {
        header('Location: reservas.php');
        exit();
    }

    // Buscar a reserva para confirmação
    $reserva = buscarReservaPorId($reserva_id);
    if (!$reserva) {
        header('Location: reservas.php');
        exit();
    }

    // Se o formulário for enviado para confirmação da exclusão
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Excluir a reserva
            if (excluirReserva($reserva_id)) {
                header('Location: reservas.php');
                exit();
            } else {
                $erro = "Erro ao excluir a reserva!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Reserva</h2>
    
    <!-- Exibir erro, se houver -->
    <?php if (!empty($erro)) :  ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir a reserva abaixo?</p>
    <ul>
        <li><strong>Data Inicial:</strong> <?= $reserva['data_inicial'] ?></li>
        <li><strong>Data Final:</strong> <?= $reserva['data_final'] ?></li>
        <li><strong>Evento:</strong> <?= $reserva['evento_nome'] ?></li>
        <li><strong>Espaço:</strong> <?= $reserva['espaco_nome'] ?></li>
    </ul>

    <form method="post">
        <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
        <a href="reservas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>