<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/espacos.php';  
    require_once '../funcoes/categorias.php';  

    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localizacao = $_POST['localizacao'];
        $categoria_id = $_POST['categoria_id'];

        // Função para criar um novo espaço
        if (criarEspaco($nome, $descricao, $localizacao, $categoria_id)) {
            echo "<div class='alert alert-success'>Espaço criado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao criar o espaço. Tente novamente.</div>";
        }
    }

    // Buscar categorias disponíveis para o select
    $categorias = todasCategorias();  // Função que retorna todas as categorias
?>

<div class="container mt-5">
    <h2>Criar Novo Espaço</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="localizacao" class="form-label">Localização</label>
            <input type="text" name="localizacao" id="localizacao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">Selecione a categoria</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Espaço</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>