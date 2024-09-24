<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Cadastro de Livros</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="mb-3">
                <label>Título do Livro:</label>
                <input type="text" class="form-control" name="titulo<?php echo $i; ?>" >
            </div>
            <div class="mb-3">
                <label>Quantidade em Estoque:</label>
                <input type="number" class="form-control" name="quantidade<?php echo $i; ?>" >
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $livros = [];

            for ($i = 0; $i < 5; $i++) {
                $titulo = $_POST["titulo$i"];
                $quantidade = $_POST["quantidade$i"];

                $livros[$titulo] = $quantidade;
            }

            ksort($livros); // Ordena pelo título

            if (!empty($livros)) {
                echo "<h3 class='mt-4'>Lista de Livros:</h3>";
                echo "<ul class='list-group'>";
                foreach ($livros as $titulo => $quantidade) {
                    $alerta = $quantidade < 5 ? " (Baixa quantidade!)" : "";
                    echo "<li class='list-group-item'>Título: $titulo, Quantidade: $quantidade$alerta</li>";
                }
                echo "</ul>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
