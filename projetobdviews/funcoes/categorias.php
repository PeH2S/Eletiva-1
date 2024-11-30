<?php

declare(strict_types=1);
require_once "../config/bancodedados.php";

function criarCategoria(string $nome): bool {
    global $pdo;

    // Preparar a consulta SQL para inserir a categoria
    $stmt = $pdo->prepare("INSERT INTO categoria (nome) VALUES (?)");

    // Executar a consulta
    return $stmt->execute([$nome]);
}

function todasCategorias(): array {
    global $pdo;
    // Altere "categorias" para "categoria"
    $stmt = $pdo->query("SELECT * FROM categoria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarCategorias(): array {
    global $pdo;
    // Alterando para a tabela correta
    $stmt = $pdo->query("SELECT * FROM categoria");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoriaPorId(int $id): ?array {
    global $pdo;
    // Alterando para a tabela correta
    $stmt = $pdo->prepare("SELECT * FROM categoria WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

function atualizarCategoria(int $id, string $nome): bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE categoria SET nome = ? WHERE id = ?");
    return $stmt->execute([$nome, $id]);
}

function excluirCategoria(int $id): bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM categoria WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
