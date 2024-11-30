<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once('../funcoes/categorias.php'); // Inclua a função que manipula as categorias

    // Verificar se o ID da categoria foi passado via GET e se é válido
    if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        echo "<p class='text-danger'>Categoria não encontrada.</p>";
        exit;
    }

    $id = (int)$_GET['id'];  // Garantir que $id seja um inteiro

    // Buscar a categoria no banco de dados
    $categoria = getCategoriaPorId($id);

    if (!$categoria) {
        echo "<p class='text-danger'>Categoria não encontrada.</p>";
        exit;
    }

    // Inicializar a variável de mensagens
    $mensagem = "";

    // Processar o formulário de atualização
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'] ?? '';

        // Verificar se o nome foi preenchido
        if ($nome != '') {
            try {
                // Chamar a função para atualizar a categoria
                if (atualizarCategoria($id, $nome)) {
                    $mensagem = "<p class='text-success'>Categoria atualizada com sucesso!</p>";
                    // Redirecionar para a página de categorias ou outro local
                    // header("Location: categorias.php");
                } else {
                    $mensagem = "<p class='text-danger'>Erro ao atualizar a categoria.</p>";
                }
            } catch (Exception $e) {
                $mensagem = "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
            }
        } else {
            $mensagem = "<p class='text-danger'>O nome da categoria é obrigatório.</p>";
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Categoria</h2>
    
    <?php if ($mensagem != ""): ?>
        <div class="alert alert-info" role="alert">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($categoria['nome']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
