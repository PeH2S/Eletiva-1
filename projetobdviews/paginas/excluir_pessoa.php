<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/pessoa.php';  
    // Verificar se o parâmetro 'id' está presente na URL
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        // Buscar os dados da pessoa para exibição
        $pessoa = buscarPessoaPorId($id);

        if (!$pessoa) {
            // Caso a pessoa não exista no banco
            echo "<div class='alert alert-danger'>Pessoa não encontrada!</div>";
            exit;
        }

        // Verificar se o formulário foi enviado para confirmar a exclusão
        if (isset($_POST['confirmar'])) {
            if (excluirPessoa($id)) {
                // Redirecionar para a página de gerenciamento de pessoas após exclusão bem-sucedida
                header('Location: pessoas.php');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Erro ao excluir pessoa. Tente novamente.</div>";
            }
        }
    } else {
        // Caso o ID não esteja na URL
        echo "<div class='alert alert-danger'>ID da pessoa não informado.</div>";
        exit;
    }
?>

<div class="container mt-5">
    <h2>Excluir Pessoa</h2>

    <p>Tem certeza de que deseja excluir a pessoa abaixo?</p>

    <ul>
        <li><strong>Nome:</strong> <?= $pessoa['nome']; ?></li>
        <li><strong>Email:</strong> <?= $pessoa['email']; ?></li>
        <li><strong>CPF:</strong> <?= $pessoa['cpf']; ?></li>
        <li><strong>RG:</strong> <?= $pessoa['rg']; ?></li>
    </ul>

    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="pessoas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>