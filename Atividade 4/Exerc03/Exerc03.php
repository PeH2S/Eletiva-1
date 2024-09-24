<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Cadastro de Produtos</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="mb-3">
                <label>Código:</label>
                <input type="text" class="form-control" name="codigo<?php echo $i; ?>" >
            </div>
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome<?php echo $i; ?>" >
            </div>
            <div class="mb-3">
                <label>Preço:</label>
                <input type="number" step="0.01" class="form-control" name="preco<?php echo $i; ?>" >
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $produtos = [];

            for ($i = 0; $i < 5; $i++) {
                $codigo = $_POST["codigo$i"];
                $nome = $_POST["nome$i"];
                $preco = $_POST["preco$i"];

                if ($preco > 100) {
                    $preco = $preco * 0.90; // Desconto de 10%
                }

                $produtos[$codigo] = ["nome" => $nome, "preco" => $preco];
            }

            uasort($produtos, function ($a, $b) {
                return strcmp($a["nome"], $b["nome"]);
            });

            if (!empty($produtos)) {
                echo "<h3 class='mt-4'>Lista de Produtos:</h3>";
                echo "<ul class='list-group'>";
                foreach ($produtos as $produto) {
                    echo "<li class='list-group-item'>Nome: " . $produto['nome'] . ", Preço: R$" . number_format($produto['preco'], 2, ',', '.') . "</li>";
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
