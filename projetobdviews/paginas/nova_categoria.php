<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once('../funcoes/categorias.php'); // Função para criar nova categoria

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Receber os dados do formulário
        $nome = $_POST['nome'] ?? '';

        // Verificar se o nome foi preenchido
        if ($nome != '') {
            try {
                // Chamar a função para criar a nova categoria
                if (criarCategoria($nome)) {
                    echo "<p class='text-success'>Categoria criada com sucesso!</p>";
                    // Redirecionar ou exibir uma mensagem de sucesso
                    // header("Location: categorias.php"); // Caso deseje redirecionar
                } else {
                    echo "<p class='text-danger'>Erro ao criar a categoria.</p>";
                }
            } catch (Exception $e) {
                echo "<p class='text-danger'>Erro: ".$e->getMessage()."</p>";
            }
        } else {
            echo "<p class='text-danger'>O nome da categoria é obrigatório.</p>";
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Categoria</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Categoria</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
