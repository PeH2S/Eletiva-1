<?php
// bancodedados.php

declare(strict_types=1);

try {
    // Configurações de conexão com o banco de dados
    $dsn = 'mysql:host=localhost;dbname=sistema_reserva;charset=utf8';
    $usuario = 'root';  // Usuário do banco de dados
    $senha = '';        // Senha do banco de dados
    $port = "3306";

    // Criar a conexão PDO
    $pdo = new PDO($dsn, $usuario, $senha);

    // Configurar para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
