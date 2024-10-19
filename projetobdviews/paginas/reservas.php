<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
?>

<div class="container mt-5">
    <h2>Gerenciamento de Reservas</h2>
    <a href="nova_reserva.php" class="btn btn-success mb-3">Novo Evento</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Evento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>10/10/2024</td>
                <td>11/10/2024</td>
                <td>Aniversário - Vanessa</td>
                <td>
                    <a href="editar_reserva.php" class="btn btn-warning">Editar</a>
                    <a href="excluir_reserva.php" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
