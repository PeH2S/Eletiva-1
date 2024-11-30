<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/categorias.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Verifica se a categoria existe antes de excluir
        if (excluirCategoria($id)) {
            echo "<p class='text-success'>Categoria excluída com sucesso.</p>";
            header("Location: categorias.php"); // Redireciona após excluir
        } else {
            echo "<p class='text-danger'>Erro ao excluir a categoria.</p>";
        }
    }

    // Função para excluir a categoria
    function excluirCategoria(int $id): bool {
        global $pdo;
        $stament = $pdo->prepare("DELETE FROM categorias WHERE id = ?");
        return $stament->execute([$id]);
    }
?>

<div class="container mt-5">
    <h2>Excluir Categoria</h2>
    
    <p>Tem certeza de que deseja excluir a categoria abaixo?</p>
    <ul>
        <li><strong>ID:</strong> <?= $id ?></li>
        <li><strong>Nome:</strong> <!-- Aqui você pode buscar o nome da categoria no banco, se necessário --></li>
    </ul>
    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="categorias.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
