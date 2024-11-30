<?php

declare(strict_types=1);
require_once '../config/bancodedados.php';  
function criarPessoa(string $nome, string $email_pessoa, string $cpf, string $rg) : bool {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO pessoa (nome, email, cpf, rg) VALUES (?, ?, ?, ?)");

    return $stmt->execute([$nome, $email_pessoa, $cpf, $rg]);
}

function buscarPessoas() : array {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM pessoa");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarPessoaPorId(int $id) : ?array {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pessoa WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function alterarPessoa(int $id, string $nome, string $email, string $cpf, string $rg) : bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE pessoa SET nome = ?, email = ?, cpf = ?, rg = ? WHERE id = ?");
    return $stmt->execute([$nome, $email, $cpf, $rg, $id]);
}

function excluirPessoa(int $id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM pessoa WHERE id = ?");
    return $stmt->execute([$id]);
}

?>