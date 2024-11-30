<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/espacos.php';  
    require_once '../funcoes/categorias.php';  

    // Verificação do ID passado na URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;  // Pega o ID passado na URL
    if ($id <= 0) {  // Caso não seja válido, redireciona para a lista de espaços
        header('Location: espacos.php'); 
        exit();
    }

    // Buscar o espaço pelo ID
    $espaco = buscarEspacoPorId($id);  // Função que busca o espaço no banco de dados
    if (!$espaco) {  // Se não encontrar o espaço, redireciona
        header('Location: espacos.php'); 
        exit();
    }

    // Variável para armazenar mensagens de erro
    $erro = "";

    // Processamento da exclusão
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);  // Obtém o ID do espaço a ser excluído
            if ($id <= 0){  // Se o ID não for válido, redireciona
                header('Location: espacos.php');
                exit();
            } else {
                // Exclui o espaço usando a função do banco de dados
                if (excluirEspaco($id)) {
                    header('Location: espacos.php');  // Redireciona para a lista de espaços
                    exit();
                } else {
                    $erro = "Erro ao excluir o espaço!";  // Caso ocorra algum erro, mostra a mensagem
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();  // Exibe erro caso haja exceção
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Espaço</h2>
    
    <!-- Exibe a mensagem de erro, se houver -->
    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>
    
    <p>Tem certeza de que deseja excluir o espaço abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= htmlspecialchars($espaco['nome']) ?></li>
        <li><strong>Descrição:</strong> <?= htmlspecialchars($espaco['descricao']) ?></li>
        <li><strong>Localização:</strong> <?= htmlspecialchars($espaco['localizacao']) ?></li>
        <li><strong>Categoria:</strong> <?= htmlspecialchars($espaco['nome_categoria']) ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="espacos.php" class="btn btn-secondary">Cancelar</a>  <!-- Link corrigido -->
    </form>
</div>

<?php require_once 'rodape.php'; ?>