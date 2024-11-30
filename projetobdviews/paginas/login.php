<?php 
    require_once('../funcoes/usuarios1.php');
    
    session_start();

    // Verificação do token CSRF
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Gera um token CSRF aleatório
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            // Verificação do token CSRF
            if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("Erro de segurança: Token inválido.");
            }

            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
            
            if ($email != "" && $senha != "") {
                // Função login que retorna o usuário
                $usuario = login($email, $senha);

                if ($usuario) {
                    $_SESSION['usuario'] = $usuario['nome'];
                    $_SESSION['nivel'] = $usuario['nivel'];
                    $_SESSION['acesso'] = true;
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $erro = "Credenciais inválidas!";
                }
            } else {
                $erro = "Por favor, preencha todos os campos.";
            }
        } catch(Exception $e) {
            error_log($e->getMessage()); // Registrar o erro
            $erro = "Ocorreu um erro, tente novamente mais tarde.";
        }
    }

    require_once 'cabecalho.php'; 
?>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" required>
        </div>
        <!-- Campo oculto com o token CSRF -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
        
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <?php 
        if (isset($erro)) echo "<p class='text-danger'>$erro</p>";
    ?>
</div>

<?php require_once 'rodape.php'; ?>
