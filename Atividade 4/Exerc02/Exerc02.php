<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos e Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Cadastro de Alunos</h2>
    <form method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome<?php echo $i; ?>" required>
            </div>
            <div class="mb-3">
                <label>Nota 1:</label>
                <input type="number" step="0.01" class="form-control" name="nota1<?php echo $i; ?>" required>
            </div>
            <div class="mb-3">
                <label>Nota 2:</label>
                <input type="number" step="0.01" class="form-control" name="nota2<?php echo $i; ?>" required>
            </div>
            <div class="mb-3">
                <label>Nota 3:</label>
                <input type="number" step="0.01" class="form-control" name="nota3<?php echo $i; ?>" required>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Calcular Médias</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alunos = [];

        for ($i = 0; $i < 5; $i++) {
            $nome = $_POST["nome$i"];
            $nota1 = $_POST["nota1$i"];
            $nota2 = $_POST["nota2$i"];
            $nota3 = $_POST["nota3$i"];

            $media = ($nota1 + $nota2 + $nota3) / 3;
            $alunos[$nome] = $media;
        }

        arsort($alunos); // Ordenar por média

        if (!empty($alunos)) {
            echo "<h3 class='mt-4'>Alunos e Médias:</h3>";
            echo "<ul class='list-group'>";
            foreach ($alunos as $nome => $media) {
                echo "<li class='list-group-item'>Nome: $nome, Média: " . number_format($media, 2) . "</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</div>
</body>
</html>
