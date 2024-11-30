<?php
require_once('cabecalho.php');
require_once('navbar.php');
require_once('../funcoes/usuarios1.php'); // O arquivo com as funções de usuários

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $nivel = $_POST['nivel'] ?? 'usuario'; // Atribui 'usuario' como valor padrão

    // Validar os campos
    if ($nome && $email && $senha) {
        // Tentar criar o novo usuário
        if (novoUsuario($nome, $email, $senha, $nivel)) {
            echo "<p class='text-success'>Usuário criado com sucesso!</p>";
        } else {
            echo "<p class='text-danger'>Erro ao criar usuário. Tente novamente mais tarde.</p>";
        }
    } else {
        echo "<p class='text-danger'>Preencha todos os campos.</p>";
    }
}
?>

<div class="container mt-5">
    <h2>Criar Novo Usuário</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nivel" class="form-label">Nível</label>
            <select name="nivel" id="nivel" class="form-control">
                <option value="usuario">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Usuário</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
