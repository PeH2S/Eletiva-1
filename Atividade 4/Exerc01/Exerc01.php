<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Cadastro de Contatos</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome<?php echo $i; ?>" >
            </div>
            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" class="form-control" name="telefone<?php echo $i; ?>" >
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $contatos = [];

            for ($i = 0; $i < 5; $i++) {
                $nome = $_POST["nome$i"];
                $telefone = $_POST["telefone$i"];

                if (!array_key_exists($nome, $contatos) && !in_array($telefone, $contatos)) {
                    $contatos[$nome] = $telefone;
                } else {
                    echo "<div class='alert alert-danger mt-3'>Contato duplicado: $nome ou telefone já existe.</div>";
                }
            }

            ksort($contatos);

            if (!empty($contatos)) {
                echo "<h3 class='mt-4'>Contatos Cadastrados:</h3>";
                echo "<ul class='list-group'>";
                foreach ($contatos as $nome => $telefone) {
                    echo "<li class='list-group-item'>Nome: $nome, Telefone: $telefone</li>";
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
