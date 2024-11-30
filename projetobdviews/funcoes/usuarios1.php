<?php
// usuarios1.php
require_once('../config/bancodedados.php'); // Verifique se esse arquivo está sendo carregado corretamente

function novoUsuario(string $nome, string $email, string $senha, string $nivel): bool {
    global $pdo;

    try {
        // Verificar se o e-mail já existe no banco de dados
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("E-mail já cadastrado.");
        }

        // Criptografar a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        
        // Preparar a query para inserção do usuário
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, nivel) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $senhaCriptografada, $nivel]);

        return true; // Retorna true se a inserção foi bem-sucedida
    } catch (Exception $e) {
        // Captura e exibe o erro
        echo "Erro: " . $e->getMessage();
        return false; // Retorna false em caso de erro
    }
}


function login(string $email, string $senha) {
    global $pdo;

    try {
        // Verificar se o usuário administrador já existe
        $stament = $pdo->query("SELECT * FROM usuario WHERE email = 'adm@adm.com'");
        $usuario = $stament->fetchAll(PDO::FETCH_ASSOC);

        // Se o administrador não existir, criar um novo
        if (!$usuario) {
            novoUsuario('Administrador', 'adm@adm.com', 'adm', 'adm');
        }

        // Verificar se o e-mail e a senha do usuário estão corretos
        $stament = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
        $stament->execute([$email]);
        $usuario = $stament->fetch(PDO::FETCH_ASSOC);

        // Validar a senha
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        } else {
            return null; // Credenciais inválidas
        }

    } catch (PDOException $e) {
        throw new Exception("Erro ao acessar o banco de dados: " . $e->getMessage());
    }
}
function todosUsuarios(): array {
    global $pdo;

    try {
        // Preparar a consulta para selecionar todos os usuários, exceto administradores
        $stament = $pdo->query("SELECT * FROM usuario WHERE nivel <> 'adm' ORDER BY nome ASC");

        // Executar e retornar os resultados
        return $stament->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Caso ocorra um erro, lançar uma exceção
        throw new Exception("Erro ao buscar todos os usuários: " . $e->getMessage());
    }
}


