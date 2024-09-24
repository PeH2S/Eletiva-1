<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Itens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Cadastro de Itens</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="mb-3">
                <label>Nome do Item:</label>
                <input type="text" class="form-control" name="nome<?php echo $i; ?>" >
            </div>
            <div class="mb-3">
                <label>Preço do Item:</label>
                <input type="number" step="0.01" class="form-control" name="preco<?php echo $i; ?>" >
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $itens = [];

            for ($i = 0; $i < 5; $i++) {
                $nome = $_POST["nome$i"];
                $preco = $_POST["preco$i"];

                $precoComImposto = $preco * 1.15; // Aplicando 15% de imposto
                $itens[$nome] = $precoComImposto;
            }

            asort($itens); // Ordena pelo preço

            if (!empty($itens)) {
                echo "<h3 class='mt-4'>Itens Cadastrados (Com Imposto):</h3>";
                echo "<ul class='list-group'>";
                foreach ($itens as $nome => $preco) {
                    echo "<li class='list-group-item'>Nome: $nome, Preço com Imposto: R$" . number_format($preco, 2, ',', '.') . "</li>";
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
