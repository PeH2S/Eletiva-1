<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/espacos.php';  
    require_once '../funcoes/categorias.php';  

    // Pega o ID passado na URL
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        header('Location: espacos.php');
        exit();
    }

    // Busca o espaço a ser editado
    $espaco = buscarEspacoPorId($id);
    if (!$espaco) {
        header('Location: espacos.php');
        exit();
    }
    
    // Busca as categorias
    $categorias = todasCategorias();

    // Variável para erros e mensagens de sucesso
    $erro = "";
    $sucesso = "";

    // Processa o envio do formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = trim($_POST['nome']);
            $descricao = trim($_POST['descricao']);
            $localizacao = trim($_POST['localizacao']);
            $categoria_id = intval($_POST['categoria_id']);
            $id = intval($_POST['id']);

            // Verifica se todos os campos obrigatórios estão preenchidos
            if(empty($nome) || empty($descricao) || empty($localizacao) || $categoria_id <= 0) {
                $erro = "Preencha todos os campos obrigatórios.";
            } else {
                // Chama a função para alterar o espaço
                if(alterarEspaco($id, $nome, $descricao, $localizacao, $categoria_id)) {
                    $sucesso = "Espaço atualizado com sucesso!";
                    // Redireciona para a página de espaços após a confirmação de sucesso
                    // header('Location: espacos.php');
                    // exit();
                } else {
                    $erro = "Erro ao alterar o espaço.";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Espaço</h2>

    <!-- Exibe mensagem de erro, se houver -->
    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <!-- Exibe mensagem de sucesso, se houver -->
    <?php if ($sucesso): ?>
        <div class="alert alert-success"><?= $sucesso ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $espaco['id'] ?>"/>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($espaco['nome']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required><?= htmlspecialchars($espaco['descricao']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="localizacao" class="form-label">Localização</label>
            <input type="text" name="localizacao" id="localizacao" class="form-control" value="<?= htmlspecialchars($espaco['localizacao']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <?php foreach ($categorias as $c): ?>
                    <option value="<?= $c['id'] ?>"
                        <?= $c['id'] == $espaco['categoria_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Espaço</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
