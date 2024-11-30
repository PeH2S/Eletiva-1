<?php

declare(strict_types=1);
require_once '../config/bancodedados.php';

// Buscar todas as reservas
function buscarReservas() : array {
    global $pdo;
    $stmt = $pdo->query("SELECT r.*, e.nome as nome_evento, es.nome as nome_espaco, p.nome as nome_pessoa FROM reservas r
                          INNER JOIN eventos e ON e.id = r.evento_id
                          INNER JOIN espacos es ON es.id = r.espaco_id
                          INNER JOIN pessoa p ON p.id = r.pessoa_id");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar uma reserva por ID
function buscarReservaPorId(int $id) : ?array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT r.*, e.nome as nome_evento, es.nome as nome_espaco, p.nome as nome_pessoa FROM reservas r
                           INNER JOIN eventos e ON e.id = r.evento_id
                           INNER JOIN espacos es ON es.id = r.espaco_id
                           INNER JOIN pessoa p ON p.id = r.pessoa_id
                           WHERE r.id = ?");

    $stmt->execute([$id]);
    $reserva = $stmt->fetch(PDO::FETCH_ASSOC);
    return $reserva ? $reserva : null;
}

// Criar uma nova reserva
function criarReserva(string $data_inicial, string $data_final, int $evento_id, int $espaco_id, int $pessoa_id, string $status) : bool {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO reservas (data_inicial, data_final, evento_id, espaco_id, pessoa_id, status) VALUES (?, ?, ?, ?, ?, ?)");

    return $stmt->execute([$data_inicial, $data_final, $evento_id, $espaco_id, $pessoa_id, $status]);
}

// Alterar uma reserva existente
function alterarReserva(int $id, string $data_inicial, string $data_final, int $evento_id, int $espaco_id, int $pessoa_id, string $status) : bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE reservas SET data_inicial = ?, data_final = ?, evento_id = ?, espaco_id = ?, pessoa_id = ?, status = ? WHERE id = ?");
    return $stmt->execute([$data_inicial, $data_final, $evento_id, $espaco_id, $pessoa_id, $status, $id]);
}

// Excluir uma reserva
function excluirReserva(int $id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM reservas WHERE id = ?");
    return $stmt->execute([$id]);
}

function buscarReservasDetalhadas(): array {
    global $pdo;

    // Consulta SQL para obter os detalhes das reservas
    $sql = "
        SELECT 
            r.id, 
            r.data_reserva, 
            r.status, 
            e.nome AS evento_nome, 
            es.nome AS espaco_nome, 
            p.nome AS pessoa_nome
        FROM reservas r
        JOIN eventos e ON r.evento_id = e.id
        JOIN espacos es ON r.espaco_id = es.id
        JOIN pessoa p ON r.pessoa_id = p.id
        ORDER BY r.data_reserva DESC;
    ";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>