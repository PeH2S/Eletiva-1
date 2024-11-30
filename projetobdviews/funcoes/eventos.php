<?php
declare(strict_types=1);
require_once '../config/bancodedados.php';

function criarEvento(string $data, int $evento_id, int $lotacao_maxima): bool {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO eventos (data, evento_id, lotacao_maxima) VALUES (?, ?, ?)");
    return $stmt->execute([$data, $evento_id, $lotacao_maxima]);
}
    
function buscarEventos(): array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM eventos"); // Ajuste o nome da tabela conforme o seu banco de dados
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function alterarEvento(int $id, string $data, int $evento_id, int $lotacao_maxima): bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE eventos SET data = ?, evento_id = ?, lotacao_maxima = ? WHERE id = ?");
    return $stmt->execute([$data, $evento_id, $lotacao_maxima, $id]);
}

function excluirEvento(int $id): bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM eventos WHERE id = ?");
    return $stmt->execute([$id]);
}


?>