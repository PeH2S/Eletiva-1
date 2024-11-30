<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/pessoa.php';  

    
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $pessoa = buscarPessoaPorId($id);

        if (!$pessoa) {
            echo "<div class='alert alert-danger'>Pessoa não encontrada!</div>";
            exit;
        }

        $nome = $pessoa['nome'];
        $email = $pessoa['email'];
        $cpf = $pessoa['cpf'];
        $rg = $pessoa['rg'];

        // Verificar se o formulário foi enviado para atualizar os dados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email_pessoa'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];

            // Atualizar dados no banco
            if (alterarPessoa($id, $nome, $email, $cpf, $rg)) {
                echo "<div class='alert alert-success'>Dados atualizados com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao atualizar os dados. Tente novamente.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>ID da pessoa não informado.</div>";
        exit;
    }
?>

<div class="container mt-5">
    <h2>Editar Pessoa</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($nome) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email_pessoa" class="form-label">Email</label>
            <input type="email" name="email_pessoa" id="email_pessoa" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">Editar CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= htmlspecialchars($cpf) ?>">
        </div>
        <div class="mb-3">
            <label for="rg" class="form-label">Editar RG</label>
            <input type="text" name="rg" id="rg" class="form-control" value="<?= htmlspecialchars($rg) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar dados</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>