<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once('../funcoes/pessoa.php'); // Função para processar os dados no banco

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email_pessoa'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $rg = $_POST['rg'] ?? '';

        // Validação dos campos
        $erros = [];
        if (!$nome) $erros[] = "O nome é obrigatório.";
        if (!$email) $erros[] = "O e-mail é obrigatório.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = "O e-mail não é válido.";
        if (!$cpf) $erros[] = "O CPF é obrigatório.";
        if (!validaCPF($cpf)) $erros[] = "O CPF não é válido.";
        if (!$rg) $erros[] = "O RG é obrigatório.";

        // Se não houver erros, prosseguir com a inserção
        if (empty($erros)) {
            try {
                if (criarPessoa($nome, $email, $cpf, $rg)) {
                    echo "<p class='text-success'>Pessoa criada com sucesso!</p>";
                } else {
                    echo "<p class='text-danger'>Erro ao criar a pessoa. Tente novamente.</p>";
                }
            } catch (Exception $e) {
                echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
            }
        } else {
            // Exibe os erros encontrados
            foreach ($erros as $erro) {
                echo "<p class='text-danger'>$erro</p>";
            }
        }
    }

    function validaCPF($cpf) {
        // Expressão regular para validar o formato do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remove caracteres não numéricos
        if (strlen($cpf) != 11) return false;
        // Lógica de verificação do CPF pode ser mais detalhada
        return true;
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Pessoa</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email_pessoa" class="form-label">Email</label>
            <input type="email" name="email_pessoa" id="email_pessoa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">RG</label>
            <input type="text" name="rg" id="rg" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Pessoa</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
