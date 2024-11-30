<?php
declare(strict_types=1);
require_once '../config/bancodedados.php';

function criarEspaco(string $nome, string $descricao, string $localizacao, int $categoria_id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO espacos (nome, descricao, localizacao, categoria_id) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nome, $descricao, $localizacao, $categoria_id]);
}

function buscarEspacoPorId(int $id) : ?array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT e.*, c.nome as nome_categoria FROM espacos e
                           INNER JOIN categorias c ON c.id = e.categoria_id 
                           WHERE e.id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

function alterarEspaco(int $id, string $nome, string $descricao, string $localizacao, int $categoria_id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE espacos SET nome = ?, descricao = ?, localizacao = ?, categoria_id = ? WHERE id = ?");
    return $stmt->execute([$nome, $descricao, $localizacao, $categoria_id, $id]);
}

function excluirEspaco(int $id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM espacos WHERE id = ?");
    return $stmt->execute([$id]);
}

function buscarEspacos() : array {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM espacos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
